    var new_url;
    function navigation(param){
        var url = window.location.href;
        var split_url = url.split('/');

        console.log(url.indexOf(param) > -1)
        if(url.indexOf(param) > -1){
            split_url.splice(-1,1, param)
            split_url.join();

            if(split_url.length < 6){
                new_url = split_url[0]+'//'+split_url[2]+'/'+split_url[3]+'/'+split_url[4]
            }
            else if(split_url[5] != 'undefined'){
                new_url = split_url[0]+'//'+split_url[2]+'/'+split_url[3]+'/'+split_url[4]+'/'+split_url[5]
            }
        }
        else{
            console.log("masuk sini")
            console.log(split_url)
            if(split_url[5]){
                split_url.splice(-1,1, param)
                split_url.join();
                new_url = split_url[0]+'//'+split_url[2]+'/'+split_url[3]+'/'+split_url[4]+'/'+split_url[5]
            }
            else if(split_url[4].length == 2){
                new_url = split_url[0]+'//'+split_url[2]+'/'+split_url[3]+'/'+split_url[4]+'/'+param
            }
            else{
                new_url = split_url[0]+'//'+split_url[2]+'/'+split_url[3]+'/'+param
            }
        }

        window.location.href = new_url
    }

    function changelanguage(lang){
        var url = window.location.href;
        var split_url = url.split('/');

        if(lang == 'id'){
            if(split_url[4].length > 1 && split_url[5]){
                split_url.splice(-2,1, '')
                split_url.join();
                new_url = split_url[0]+'//'+split_url[2]+'/'+split_url[3]+'/'+split_url[5]
            }
            else if(split_url[4].length > 1){
                split_url.splice(-1,1, '')
                split_url.join();
                new_url = split_url[0]+'//'+split_url[2]+'/'+split_url[3]
            }
            else{
                split_url.splice(-2,1, '');
                new_url = split_url[0]+'//'+split_url[2]+'/'+split_url[3]+'/'+split_url[5]
            }
        }
        else{
            split_url.splice(-1, 0, lang)
            split_url.join();
            new_url = split_url[0]+'//'+split_url[2]+'/'+split_url[3]+'/'+split_url[4]+'/'+split_url[5]
        }

        window.location.href = new_url;
    }
