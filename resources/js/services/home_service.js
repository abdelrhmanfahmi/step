import {http , httpFile} from "./http_service";

export function getSettings(){
    return http().get('/settings');
}

export function getBenifits(){
    return http().get('/benifits');
}

export function getWhySteps(){
    return http().get('/whySteps');
}

export function getPackages(){
    return http().get('/packages');
}

export function getPackageServices(id){
    return http().get('/services/'+id);
}

// export function getPackageServices(){
//     return http().get('/getServices');
// }