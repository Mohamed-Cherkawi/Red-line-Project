    // Toggling the search bar icon js Code .
    const icon = document.querySelector(".searchIcon");
    const search = document.querySelector(".search");
    icon.onclick = function () {
        search.classList.toggle("active");
    };
    // getting the Plus and the Minus Sign Elements , and the product quantity wanted .
    const minus = document.getElementById("minus");
    const plus = document.getElementById("plus");
    const quantity = document.getElementById("quantity");
    const quantityHidden = document.getElementById("quantityInput");
    let quantityValue = quantity.innerText ;

    // Changing the value from string to an int :
    parseInt(quantityValue);
    plus.addEventListener("click", addOne);
    minus.addEventListener("click", subOne);

    function addOne() {
       if(quantityValue < 20) {
        quantity.innerText = ++quantityValue;
        quantityHidden.setAttribute("value",quantityValue);
       } else {
        return ;
       }
    }
    function subOne() {
        if(quantityValue > 1) {

        quantity.innerText = --quantityValue;
        quantityHidden.setAttribute("value",quantityValue);

        } else {
            return ;
        }

    }