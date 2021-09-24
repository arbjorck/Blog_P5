window.onload = () => {
    // Variables
    let stripe = Stripe('pk_test_51JcpBaKgzEvwFDZUJdozKSGX7hPdN4o5wpjlVaPpx0yoV5Of6ZjK2QceW6DPI5Mm4RtfBg5YzIaaIaNWxK4eNMSl00JEWeCosg')
    let elements = stripe.elements()
    let redirect = "/blog/index.php?paymentsuccess"
    let displayError = document.getElementById("card-errors")
    let displayErrorPayment = document.getElementById("errors")

    // Objects from the page
    let cardHolderName = document.getElementById("cardholder-name")
    let cardButton = document.getElementById("card-button")
    let clientSecret = cardButton.dataset.secret;

    // Create card form elements
    let card = elements.create("card")
    card.mount("#card-elements")

    // Checking the inputs
    card.addEventListener("change", (event) => {
        if(event.error){
            displayError.textContent = event.error.message;
            displayError.classList.add('msg');
            displayError.classList.add('error');
        }else{
            displayError.textContent = '';
            displayError.classList.remove('msg');
            displayError.classList.remove('error');
        }
    })

    // Let's process the payment
    cardButton.addEventListener("click", () => {
        stripe.handleCardPayment(
            clientSecret, card, {
                payment_method_data: {
                    billing_details: {name: cardHolderName.value}
                }
            }
        ).then((result) => {
            if(result.error){
                displayErrorPayment.innerText = result.error.message
                displayErrorPayment.classList.add('msg');
                displayErrorPayment.classList.add('error');
            }else{
                document.location.href = redirect
            }
        })
    })

}