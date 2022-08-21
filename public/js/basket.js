    // Toggling the search bar icon js Code .
    const icon = document.querySelector(".searchIcon");
    const search = document.querySelector(".search");
    icon.onclick = function () {
        search.classList.toggle("active");
    };
    // getting the Plus and the Minus Sign Elements , and the product quantity wanted .
    const minus = document.querySelectorAll(".minus");
    const plus = document.querySelectorAll(".plus");
    const quantity = document.querySelectorAll(".quantity");
    // const quantityHidden = document.getElementById("quantityInput");
    let quantityValue = quantity.innerText ;

    // Changing the value from string to an int :
    parseFloat(quantityValue);
    plus.addEventListener("click", addOne);
    minus.addEventListener("click", subOne);

    function addOne() {
       if(quantityValue < 20) {
        quantityValue = ++quantityValue;
        // quantityHidden.setAttribute("value",quantityValue);
       } else {
        return ;
       }
    }
    // quantity.forEach((e) => {
    //     console.log("Is it working ");
    // })
    function subOne() {
        if(quantityValue > 1) {

        quantityValue = --quantityValue;
        // quantityHidden.setAttribute("value",quantityValue);

        } else {
            return ;
        }

    }