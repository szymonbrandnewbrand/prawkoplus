
$(document).ready(function () {
    $.getJSON("js/data.json", function (os) {
    const urlParams = new URLSearchParams(window.location.search);
    const myParam = urlParams.get('id');
    const rat = urlParams.get('r');
    let list = []; 
    let data;
        
        for (let key in os) {
            os[key].category = os[key].category.split(" ")
            list.push(os[key]);
        }
            data = list.filter((e) => e.id == myParam);
            data[0].rating = Number(rat);
            

    var price = data[0].price;
    var wal = 'PLN';
    var img = data[0].img;
    var description = data[0].description;
    var rating1 = data[0].rating1;

    if (rating1 ==0) {
        rating1="brak";
    }


    if(price.length<1){
        var price = 'brak';
        var wal = '';
    }

    if(description == 0){
        var description = 'Ośrodek nie zgłosił się do programu Prawko Plus.';
    }

    if(img == 0){
        var img = 'card-img.png';
    }

    const stars = Math.floor(data[0].rating)
    

    const osRatings = [];

    const x = [data[0].rating1, data[0].rating2, data[0].rating3, data[0].rating4, data[0].rating5];

    createStars = (stars) => {
        var starImg = ``;
        for (let i = 0; i < stars; i++) {
            starImg += /*html */`<img class="star" src="img/star.png">`;
        }

        return starImg;
    }


    const itemHeader = /*html*/`
        <div class="col-md-5 d-flex os-img p-0 justify-content-center align-items-center">
            <img src="img/${img}">
        </div>
        <div class="col-md-7">
            <h4 class="c-red font-weight-bold text-left">${data[0].name}</h4>
            <div class="row mt-3">
                <div class="col">
                    <h5 class="text-left">cena: <span class="font-weight-bold">${price} ${wal}</span></h5>
                </div>
                <div class="col text-right">
                    <h5 class="font-weight-bold">${data[0].category}</h5>
                </div>
            </div>
            <div class="row mt-2 justify-content-between">
                <div class="col">
                    <h5 class="text-left">ocena: <span class="font-weight-bold">${data[0].rating}</span></h5>
                </div>
                <div class="col">
                    <div class="row justify-content-end ml-xl-0">
                        ${createStars(stars)}
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-xl-12">
                    <h5>${data[0].street}</h5>
                    <h5>${data[0].city}</h5>
                </div>
            </div>
        </div>
    `

    if (data[0].rating != 0) {
        var kategorie = ["Zaangażowanie instruktora:", "Efekt szkolenia:", "Zaangażowanie ośrodka:", "Profesjonalizm instruktora:", "Stan samochodów szkoleniowych:"];
    } else {
        var kategorie = ["", "", "", "", ""];
    }

    
    for (let k = 0; k < 5; k++) {

        osRatings.push(/*html*/ `
            <div class="px-0 mb-4 col-md-6">
                <p class="mb-0">${kategorie[k]} </p>
                <div class="row justify-content-center justify-content-xl-start ml-xl-0">
                    ${createStars(x[k])}
                </div>
            </div>
            
    `)
    }

    var rating_test = "brak";


    const itemHeader_test = /*html*/`
        <div class="col-md-5 d-flex os-img p-0 justify-content-center align-items-center">
            <img src="img/${img}">
        </div>
        <div class="col-md-7">
            <h4 class="c-red font-weight-bold text-left">${data[0].name}</h4>
            <div class="row mt-3">
                <div class="col">
                    <h5 class="text-left">cena: <span class="font-weight-bold">${price} ${wal}</span></h5>
                </div>
                <div class="col text-right">
                    <h5 class="font-weight-bold">${data[0].category}</h5>
                </div>
            </div>
            <div class="row mt-2 justify-content-between">
                <div class="col">
                    <h5 class="text-left">ocena: <span class="font-weight-bold">${rating_test}</span></h5>
                </div>
                <div class="col">
                    <div class="row justify-content-end ml-xl-0">
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-xl-12">
                    <h5>${data[0].street}</h5>
                    <h5>${data[0].city}</h5>
                </div>
            </div>
        </div>
    `



    console.log(osRatings);


    const ratings = document.getElementById('os-ratings');

    const des = document.getElementById('os-description');
    const he = document.getElementById('os-card-header');

    const ra = document.createElement("div");

    const cardHeader = document.createElement("div");
    const descripton = document.createElement("p");

    const form_text = document.getElementById('form-text');
    form_text.innerHTML = `Uzupełnij formularz kontaktowy. Ośrodek ${data[0].name} skontaktuje się z Tobą.`

    const mail_osk = document.getElementById('mail_osk');
    mail_osk.innerHTML = `
    <input type="email" class="invisible_bnb" name="osk" value="${data[0].email}">
    <input type="text" class="invisible_bnb" name="kat" value="${data[0].category}">
    `

    ra.className = "row justify-content-start m-0";

    for (let i = 0; i < osRatings.length; i++) {
        ra.innerHTML += osRatings[i];
    }

    console.log(ra)


    cardHeader.className = "row m-0";
    cardHeader.innerHTML = '';
    if (data[0].rating == 0) {
        cardHeader.innerHTML += itemHeader_test;
    } else {
        cardHeader.innerHTML += itemHeader;
    }
    descripton.innerHTML = description;


    he.appendChild(cardHeader);
    des.appendChild(descripton);
    ratings.appendChild(ra);
});
});