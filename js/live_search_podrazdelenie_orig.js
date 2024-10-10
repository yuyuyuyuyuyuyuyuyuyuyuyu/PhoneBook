document.querySelector('#podrazdelenie').oninput = function(){
    let val = this.value.trim();
    let podrazdelenieItems = document.querySelectorAll('.podrazdelenie a');
    if (val != ''){
        podrazdelenieItems.forEach(function (elem) {
                if (elem.innerText.search(val)==-1){
                    elem.classList.add('hide');
                    elem.innerHTML = elem.innerText;
                }
                else{
                    elem.classList.remove('hide');
                    let str = elem.innerText;
                    elem.innerHTML = insertMark (str,elem.innerText.search(val), val.length);
                }
        }  ); 
    }
    else{
        podrazdelenieItems.forEach(function (elem){
            elem.classList.remove('hide');
            elem.innerHTML = elem.innerText;

        });
    }
}

function insertMark(string, pos, len){
    return string.slice(0,pos) + '<mark>'+ string.slice(pos, pos+len)+
                 '</mark>' +string.slice(pos+len);
}