
$(document).ready(function () {
    $('.arrows').click(function (event) {
        $('body, html').animate({
            scrollTop: $(".search").offset().top
        }, 600);

    });
    $('a[href*="#"]').bind('click', function (e) {
        e.preventDefault(); // prevent hard jump, the default behavior

        var target = $(this).attr("href"); // Set the target as variable

        // perform animated scrolling by getting top-position of target-element and set it as scroll target
        $('html, body').stop().animate({
            scrollTop: $(target).offset().top
        }, 1400, function () {
            location.hash = target; //attach the hash (#jumptarget) to the pageurl
        });

        return false;
    });
});

var cities = [];
var categories = ['AM', 'A1', 'A2', 'A', 'B1', 'B', 'C1', 'C', 'D1', 'D', 'BE', 'C1E', 'CE', 'D1E', 'DE', 'T'];





$.getJSON("js/data.json", function (os) {




    let counter = 0;
    let active = 1;

    if (Number(sessionStorage.getItem('active') > active)) {
        active = Number(sessionStorage.getItem('active'));
    }
    let city = sessionStorage.getItem('city') ? sessionStorage.getItem('city') : null;
    let category = sessionStorage.getItem('category') ? sessionStorage.getItem('category') : null;
    console.log(city, category)
    let price = null;
    let star = null;
    let list = [];
    let sortVar = sessionStorage.getItem('sortVar') ? Number(sessionStorage.getItem('sortVar')) : 's';

    $("#starPrice option[value=" + sortVar + "]").attr('selected', 'selected');
    $("#city option[value=" + city + "]").attr('selected', 'selected');
    $("#category option[value=" + category + "]").attr('selected', 'selected');

    for (let key in os) {
        os[key].category = os[key].category.split("/(\s+)/")
        list.push(os[key]);
    }


    for (let i = 0; i < list.length; i++) {
        list[i].rating = (list[i].rating1 + list[i].rating2 + list[i].rating3 + list[i].rating4 + list[i].rating5) / 5;
        list[i].visible = true;
        list[i].shortDescription = list[i].description;
        if (list[i].shortDescription < 1) {
            list[i].shortDescription = 'Ośrodek nie zgłosił się do programu Prawko Plus.';
        }
        if (list[i].shortDescription.length > 80) {
            list[i].shortDescription = list[i].description.slice(0, 80) + '...';
        }
    }



    var cit = [];

    for (let i = 0; i < list.length; i++) {
        var citiesnew = cit.push(list[i].city);
    }



    for (let j = 0; j < cit.length; j++) {
        for (let k = 0; k < cit.length; k++) {
            if (j != k) {
                if (cit[j] == cit[k]) {
                    cit[k] = "NULL";
                }
            }
        }
    }

    var b = 0;

    for (let a = 0; a < cit.length; a++) {
        if (cit[a] != "NULL") {
            cities[b] = cit[a];
            b++;
        }
    }



    for (let i = 0; i < cities.length; i++) {
        const c = /*html*/ `
            <option value=${cities[i]}>${cities[i]}</option>
        `
        $("#city").append(c);
    }


    for (let i = 0; i < categories.length; i++) {
        const ca = /*html*/ `
            <option value=${categories[i]}>${categories[i]}</option>
        `
        $("#category").append(ca);
    }



    activeHandle = (e) => {
        active = e;
        sessionStorage.setItem('active', active);
        trig();
        bTrig();
    }

    activeC = (e) => {
        if (active >= 1 && active < Math.ceil(counter / 3) && e === 1) {
            active += e;
            sessionStorage.setItem('active', active);
            trig();
            bTrig();
        } else if (e === -1 && active > 1) {
            active += e;
            sessionStorage.setItem('active', active);
            trig();
            bTrig();
        }

    }

    starPrice = (e, g) => {
        active = g ? 1 : Number(sessionStorage.getItem('active'));
        sortVar = e;
        sessionStorage.setItem('sortVar', sortVar);
        if (e == 1 || e == 3) {
            price = true;
            star = false;
        } else if (e == 0 || e == 2) {
            star = true;
            price = false;
        } else {
            star = false;
            price = false;
        }

        sortStarPrice();
    }


    changeSort = (e) => {
        active = e ? 1 : Number(sessionStorage.getItem('active'));
        if ($(".select1 option:selected").text() !== "miasto") {
            city = $(".select1 option:selected").text();
            sessionStorage.setItem('city', city);
        } else {
            city = null;
            sessionStorage.setItem('city', '1');
        }

        if ($(".select2 option:selected").text() !== "kategoria kursu") {
            category = $(".select2 option:selected").text();
            sessionStorage.setItem('category', category);
        } else {
            category = null;
            sessionStorage.setItem('category', '1');
        }

        function findCategory(x) {
            return x === category;
        }

        for (let i = 0; i < list.length; i++) {
            if (city !== null && category !== null) {
                if (list[i].city === city && list[i].category.find(findCategory)) {
                    list[i].visible = true;
                } else {
                    list[i].visible = false;
                }
            } else if (category !== null) {
                if (list[i].category.find(findCategory)) {
                    list[i].visible = true;
                } else {
                    list[i].visible = false;
                }
            } else if (city !== null) {
                if (list[i].city !== city) {
                    list[i].visible = false;
                } else {
                    list[i].visible = true;
                }
            } else {
                list[i].visible = true;
            }

        }
        vis();
    }
    changeSort(false);



    sortStarPrice = () => {

        if (star) {
            if (sortVar == 0) {
                list.sort((a, b) => (a.rating < b.rating) ? 1 : -1);
            } else {
                list.sort((a, b) => (a.rating < b.rating) ? -1 : 1);
            }
        } else if (price) {
            if (sortVar == 1) {
                list.sort((a, b) => (Number(a.price) < Number(b.price)) ? -1 : 1);
            } else {
                list.sort((a, b) => (Number(a.price) < Number(b.price)) ? 1 : -1);
            }
        }
        vis();

    }

    starPrice(sortVar, false);

    storeToLocal = (id) => {
        sessionStorage.setItem('item', JSON.stringify(list[id]));
    }



    function vis() {
        markups = [];
        markupsMob = [];
        counter = 0;

        for (let i = 0; i < list.length; i++) {
            var price = list[i].price;
            var wal = 'PLN';
            var img = list[i].img;

            if (list[i].price == 0) {
                var price = 'brak';
                var wal = '';
            }
            if (list[i].img == 0) {
                var img = 'card-img.png';
            }

            if (list[i].visible !== false) {
                const markup = [/*html*/`  
                        <div class="image d-flex align-items-center justify-content-center col-3 p-0 py-3 pl-3">
                            <img style="height: 90%;" src="img/${img}">
                        </div>
                        <div class="item-content col-6 c-back py-4 d-flex flex-column justify-content-between">
                            <h4 class="c-red">Ośrodek ${list[i].name}</h4>
                            <div class="descripton-short my-2">
                                <p>${list[i].shortDescription} 
                                </p>
                            </div>
                            <div class="d-block d-xl-flex">
                                <p>ocena: <b>${list[i].rating}</b></p>
                                <p class="ml-0 ml-xl-5">cena: <b>${price} ${wal}</b></p>
                            </div>
                        </div>
                        <div class="category d-flex flex-column justify-content-between my-4 px-3 col-2" style="border-left: 2px solid black;">
                            <div>
                                <p><b>${list[i].category}</b></p>
                                <p class="mt-2 mb-0">${list[i].street}</p>
                                <p><b>${list[i].city}</b></p>
                            </div>
                            <div class="button">
                                <a id=${i} class="btn btn-primary" href="kurs.php?id=${list[i].id}&r=${list[i].rating}" onclick="storeToLocal(${i})">szczegóły</a>
                            </div>
                        </div>
                        
                    `]
                const markupM = [/*html*/`  
                    <div class="wrap p-3">
                        <div class="d-flex flex-wrap">
                            <div class="image w-50">
                                <img src="img/${img}">
                            </div>
                            <div class="des c-back w-50 pt-2">
                                <h4 class="c-red">Ośrodek ${list[i].name}</h4>
                                <p><b>${list[i].category}</b></p>
                                <p>ocena: <b>${list[i].rating}</b></p>
                                <p class="ml-0 ml-xl-5">cena: <b>${price} ${wal}</b></p>
                            </div>
                            <div class="w-100 c-back py-3">
                                <div class="descripton-short my-2">
                                    <p> ${list[i].shortDescription} </p>
                                </div>
                            </div>
                            <div class="w-100 c-back d-flex justify-content-between">
                                <div class="address">
                                    <p class="mt-2 mb-0">${list[i].street}</p>
                                    <p><b>${list[i].city}</b></p>
                                </div>
                                <a id=${i} class="btn btn-primary align-self-end" href="kurs.php?id=${list[i].id}&r=${list[i].rating}" onclick="storeToLocal(${i})">szczegóły</a>
                            </div>
                        </div>
                    </div>
                `]

                markups.push(markup);
                markupsMob.push(markupM);
                counter++;
            }

        }


        d();
    }

    function d() {
        markupsD = [];
        markupsM = [];

        for (var i = 0; i < Math.ceil(counter / 4); i++) {
            markupsD[i] = new Array();
            markupsM[i] = new Array();
        }

        for (let i = 1; i <= Math.ceil(counter / 4); i++) {
            for (let j = (i - 1) * 4, a = 0; j < i * 4; j++ , a++) {
                if (markups[j]) {
                    markupsD[i - 1][a] = markups[j];
                    markupsM[i - 1][a] = markupsMob[j];
                }

            };


        }

        trig();
        bTrig();
    }

    function bTrig() {
        let c = document.getElementById('numerki');
        c.innerHTML = "";
        console.log("active " + active)
        const mcon = Math.ceil(counter / 4);
        let buttons;
        buttons = /*html*/ `
                <button onclick='activeHandle(${active})' class="btn-mine active" id=${active}>${active}</button>     
       `

        // for (let i = 1; i < 5; i++) {
        //     buttons += /*html*/ `
        //         <button onclick='activeHandle(${i})' class="btn-mine" id=${i}>${i}</button>     
        //     `
        //     if (i == 4) {

        //         buttons += "...";
        //         buttons += /*html*/ `
        //         <button onclick='activeHandle(${mcon})' class="btn-mine" id=${mcon}>${mcon}</button>     
        //     `
        //     }
        // }
        c.innerHTML += buttons;



    }

    function trig() {
        const b = document.getElementsByClassName('btn-mine');
        for (let i = 0; i < b.length; i++) {
            $(b[i]).removeClass('active');
        }
        console.log(b);
        $(b[active - 1]).addClass('active');

        const list = document.getElementById('search-list');
        const listMobile = document.getElementById('search-list-mobile');
        list.innerHTML = '';
        listMobile.innerHTML = '';
        if (markupsD[0]) {
            if (active <= 0) {
                active = 1;
            }
            console.log(active, sessionStorage.getItem('active'))
            for (let j = 0; j < markupsD[active - 1].length; j++) {
                const el = document.createElement('div');
                const elMob = document.createElement('div');
                el.className = "search-item d-flex position-relative p-0 justify-content-between aling-items-center";
                elMob.className = "search-item d-flex position-relative p-0";
                el.innerHTML += markupsD[active - 1][j];
                elMob.innerHTML += markupsM[active - 1][j];


                list.appendChild(el);
                listMobile.appendChild(elMob);
            }
        }

    }

    trig();
});

