import translation from '../../../lang/ru.json' assert {type: 'json'};

function translatable(object){
    return new class {
        constructor() {
            return new Proxy(this, {
                get(target, name, receiver) {
                    if(name in object){
                        return translation.hasOwnProperty(object[name]) ? translation[object[name]] : object[name];
                    } else if(translation.hasOwnProperty(name)){
                        return translation[name];
                    } else {
                        return name;
                    }
                },
            });
        }
    }
}

class Lang{
    // WE CAN USE THIS CLASS WITH STATIC PROS TO CREATE TRANS PROXIES LIKE: 
    // static Short = 'Some long string';
}

Lang = translatable(Lang);
export default Lang