const search = document.querySelector('.search-text-input');
const products = document.querySelectorAll('.product-main-container');
const productNames = document.querySelectorAll('.product-search-name');


var keyArray = [];

search.addEventListener('keydown', (evt) => {
    //Fill search array
    if(evt.keyCode != 8 & evt.keyCode != 16) {
        keyArray.push(String.fromCharCode(evt.keyCode));
    }
    else if(evt.keyCode == 8 & keyArray.length != 0) {
        keyArray.splice(-1,1);
    }

    //create search string
    var searchQuery = "";
    for(i = 0; i < keyArray.length; i++) {
        searchQuery += keyArray[i];
    }

    // console.log(searchQuery);

    //Search Name for Queryvar 
    hiddenItems = [];
    for(i = 0; i < productNames.length; i++) {
        if(!productNames[i].innerHTML.toUpperCase().includes(searchQuery)) {
            products[i].classList.add('hidden');
            hiddenItems.push(products[i]);
        }
        if(evt.keyCode == 8) {
            for(j = 0; j < hiddenItems.length; j++) {
                productNames[j].classList.remove('hidden');
            }
        }
    }


    console.log(hiddenItems);


});
