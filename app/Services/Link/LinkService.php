<?php

namespace App\Services\Link;

use App\Actions\Link\CreateLinkAction;
use App\Actions\Link\DeactivateLink;
use App\Contracts\Link\LinkableService;
use App\Exceptions\Link\LinkExpireOrNotActive;
use App\Models\Link\Link;
use App\Services\BaseAuthService;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 *  LinkService
 */
class LinkService extends BaseService implements LinkableService
{

    public function modelName(): string
    {
        return Link::class;
    }

    /**
     * Create Link
     *
     * @return Model
     */
    public function create(): Link
    {
        return CreateLinkAction::run();
    }

    /**
     * @inheritDoc
     */
    public function generateByCustomer(string $customerId): Link
    {
        return CreateLinkAction::run($customerId);
    }

    public function deactivateLink(string $linkId): void
    {
        DeactivateLink::run(
            $this->model->whereUuid($linkId)->firstOrFail(),
        );
    }

    public function getByCurrentCustomer(): Collection
    {
        $customerId = BaseAuthService::currentCustomer()->uuid;

        return $this->model->whereIsActive(true)->where('customer_id', $customerId)->get();
    }

    public function getById(string $linkId): Link
    {
        $link = $this->model->whereUuid($linkId)->firstOrFail();

        $this->checkLink($link);

        $link->load('game');

        return $link;
    }

    protected function checkLink($link)
    {
        if (!$this->checkActive($link)) {
            throw new LinkExpireOrNotActive;
        }

        if ($this->checkExpire($link)) {

            $this->deactivateLink($link->uuid);

            throw new LinkExpireOrNotActive;
        }
    }

    protected function checkExpire(Link $link): bool
    {
        return now()->gte($link->start_time->addMinutes(700));
    }

    protected function checkActive(Link $link): bool
    {
        return $link->is_active;
    }
}
