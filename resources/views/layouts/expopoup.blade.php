<style>
  .footer-popup {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 320px;
    height: 350px;
    background: transparent;
    /*box-shadow: 0 10px 30px rgba(0,0,0,0.25);*/
    border-radius: 10px;
    overflow: hidden;
    z-index: 999999;

    /* Start hidden below */
    transform: translateY(120%);
    transition: transform 0.6s ease;
}

.footer-popup.active {
    transform: translateY(0);
}

.footer-popup img {
    width: 100%;
    height: 100%;
}

.popup-close {
    position: absolute;
    top: 8px;
    right: 8px;
    width: 32px;
    height: 32px;
    border: none;
    background: #fff;
    border-radius: 50%;
    font-size: 22px;
    cursor: pointer;
    z-index: 10;
}

</style>
<div class="footer-popup" id="footerPopup">
    <button class="popup-close" onclick="closePopup()">×</button>

    <a href="https://registration.experientevent.com/ShowSGL261/FLOW/ATT?marketingCode=SEG262574">
        <img src="https://allwinrotoplast.com/public/front/images/regpoup.png"
         alt="Popup Image" loading="eager">
         </a>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {

    const popup = document.getElementById("footerPopup");

    // setTimeout(() => {
    //     popup.classList.add("active");
    // }, 300);

});

function closePopup() {
    document.getElementById("footerPopup").classList.remove("active");
}
</script>

