import {http , httpFile} from "./http_service";

export function getPackage(id){
    return http().get('/package/'+id);
}

export function getServicesFromPackage(id){
    return http().get('/servicesWithPackages/'+id);
}

export function getExtraPackages(){
    return http().get('/extraPackages');
}

export function StoreSubscriptions(data){
    return httpFile().post('/storeSubscripes' , data);
}