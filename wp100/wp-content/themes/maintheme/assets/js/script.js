
document.addEventListener("DOMContentLoaded", function () {


});

function next(){
    let next_slide = document.querySelector(".is-next");
    next_slide.addEventListener("click", (event) => {

            const btns = document.querySelectorAll('.avatar-details__item');
            btns.forEach((element) => {

                if(element.classList.contains('detail-active')){
                    element.classList.remove("detail-active");
                    element.classList.add("detail-prev");

                }else if(element.classList.contains('detail-next')){
                    element.classList.remove("detail-next");
                    element.classList.add("detail-active");

                }else if(element.classList.contains('detail-prev')){
                    element.classList.remove("detail-prev");
                    element.classList.add("detail-first");

                }else if(element.classList.contains('detail-first')){
                    element.classList.remove("detail-first");
                    element.classList.add("detail-last");

                }else if(element.classList.contains('detail-last')){
                    element.classList.remove("detail-last");
                    element.classList.add("detail-next");

                }

            });

            const slides = document.querySelectorAll('.slider-slide');
            slides.forEach((element) => {

                if(element.classList.contains('active')){
                    element.classList.remove("active");
                    element.classList.add("prev");

                }else if(element.classList.contains('next')){
                    element.classList.remove("next");
                    element.classList.add("active");

                }else if(element.classList.contains('prev')){
                    element.classList.remove("prev");
                    element.classList.add("first");

                }else if(element.classList.contains('first')){
                    element.classList.remove("first");
                    element.classList.add("last");

                }else if(element.classList.contains('last')){
                    element.classList.remove("last");
                    element.classList.add("next");


                } else if(element.classList.contains('active-prev')){
                    element.classList.remove("active-prev");
                    element.classList.add("prev");

                }else if(element.classList.contains('next-prev')){
                    element.classList.remove("next-prev");
                    element.classList.add("active");

                }else if(element.classList.contains('prev-prev')){
                    element.classList.remove("prev-prev");
                    element.classList.add("first");

                }else if(element.classList.contains('first-prev')){
                    element.classList.remove("first-prev");
                    element.classList.add("last");

                }else if(element.classList.contains('last-prev')){
                    element.classList.remove("last-prev");
                    element.classList.add("next");

                }

            });

        }
    );
}
function prev(){
    let previous_slide = document.querySelector(".is-prev");
    previous_slide.addEventListener("click", (event) => {
            const btns = document.querySelectorAll('.avatar-details__item');
            btns.forEach((element) => {

                if(element.classList.contains('detail-active')){
                    element.classList.remove("detail-active");
                    element.classList.add("detail-next");

                }else if(element.classList.contains('detail-next')){
                    element.classList.remove("detail-next");
                    element.classList.add("detail-last");

                }else if(element.classList.contains('detail-prev')){
                    element.classList.remove("detail-prev");
                    element.classList.add("detail-active");

                }else if(element.classList.contains('detail-first')){
                    element.classList.remove("detail-first");
                    element.classList.add("detail-prev");

                }else if(element.classList.contains('detail-last')){
                    element.classList.remove("detail-last");
                    element.classList.add("detail-first");

                }

            });

            const slides = document.querySelectorAll('.slider-slide');
            slides.forEach((element) => {

                if(element.classList.contains('active')){
                    element.classList.remove("active");
                    element.classList.add("next-prev");

                }else if(element.classList.contains('next')){
                    element.classList.remove("next");
                    element.classList.add("last-prev");

                }else if(element.classList.contains('prev')){
                    element.classList.remove("prev");
                    element.classList.add("active-prev");

                }else if(element.classList.contains('first')){
                    element.classList.remove("first");
                    element.classList.add("prev-prev");

                }else if(element.classList.contains('last')){
                    element.classList.remove("last");
                    element.classList.add("first-prev");


                }else if(element.classList.contains('active-prev')){
                    element.classList.remove("active-prev");
                    element.classList.add("next-prev");

                }else if(element.classList.contains('next-prev')){
                    element.classList.remove("next-prev");
                    element.classList.add("last-prev");

                }else if(element.classList.contains('prev-prev')){
                    element.classList.remove("prev-prev");
                    element.classList.add("active-prev");

                }else if(element.classList.contains('first-prev')){
                    element.classList.remove("first-prev");
                    element.classList.add("prev-prev");

                }else if(element.classList.contains('last-prev')) {
                    element.classList.remove("last-prev");
                    element.classList.add("first-prev");
                }
            });

        }
    );

}
