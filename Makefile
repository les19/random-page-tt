export

SAIL := ./vendor/bin/sail

# Run containers
up:
	@$(SAIL) up -d

# Run containers
down:
	@$(SAIL) down

# Key generate
key:
	@$(SAIL) artisan key:generate

# Run migrations
migrate:
	@$(SAIL) artisan migrate

# Run migrations
migrate-seed:
	@$(SAIL) artisan migrate:fresh --seed -n --force

watch:
	@$(SAIL) yarn dev

# Chown elastic folders
chown:
	chown -R "$$(id -u):$$(id -g)" ./vendor ./var

# Install sail and composer.
sail:
	docker run --rm \
		-u "$$(id -u):$$(id -u)" \
		-v $$(pwd):/opt \
		-w /opt \
		laravelsail/php81-composer:latest \
		composer install --ignore-platform-reqs

# Install backend
composer-install:
	@$(SAIL) composer install

# Setup project
setup: sail up key

# Run project
start: chown up composer-install migrate-seed
