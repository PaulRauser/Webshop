// const search = document.querySelector('.search-text-input');
const products = document.querySelectorAll('.product-main-container');
const productNames = document.querySelectorAll('.product-search-name');

var inputText = document.getElementById('bumsen');


document.addEventListener('keyup', () => {
    var text = inputText.value.toUpperCase();

   

    for(i = 0; i < productNames.length; i++) {
        if(!productNames[i].innerHTML.toUpperCase().includes(text)) {
            products[i].classList.add('hidden');
        }
        if(productNames[i].innerHTML.toUpperCase().includes(text)) {
            products[i].classList.remove('hidden');
        }
    }
});


//Hat trotzdem Spaß gemacht :)

// var keyArray = [];

// search.addEventListener('keydown', (evt) => {
    //Fill search array
    // for(i = 0; i < productNames.length; i++) {
    //     if(!productNames[i].includes(search.value)) {
    //         products[i].classList.add('hidden');
    //     }
    // }





    // if(evt.keyCode != 8 & evt.keyCode != 16) {
    //     keyArray.push(String.fromCharCode(evt.keyCode));
    // }
    // else if(evt.keyCode == 8 & keyArray.length != 0) {
    //     keyArray = [];
    //     for(k = 0; k < productNames.length; k++) {
    //         products[k].classList.remove('hidden');
    //     }
    // }

    // //create search string
    // var searchQuery = "";
    // for(i = 0; i < keyArray.length; i++) {
    //     searchQuery += keyArray[i];
    // }

    // // console.log(searchQuery);

    // //Search Name for Queryvar 
    // hiddenItems = [];
    // for(i = 0; i < productNames.length; i++) {
    //     if(!productNames[i].innerHTML.toUpperCase().includes(searchQuery)) {
    //         products[i].classList.add('hidden');
    //         hiddenItems.push(products[i]);
    //     }
    // }
    // console.log(hiddenItems);

    // if(evt.keyCode == 8) {
    //     for(j = 0; j < hiddenItems.length; j++) {
    //         console.log(searchQuery)
    //         if(hiddenItems[j].innerHTML.toUpperCase().includes(searchQuery)) {
    //             products[j].classList.remove('hidden');
    //         } 
    //     }
    // }


    // if(hiddenItems.length == 0) {
    //     for(k = 0; k < productNames.length; k++) {
    //         products[k].classList.remove('hidden');
    //     }
    // }
// });

// hidden items mit if und suchstring!!!
