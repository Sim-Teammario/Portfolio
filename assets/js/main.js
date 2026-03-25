document.addEventListener("DOMContentLoaded", function() {
    const banner = document.getElementById("cookie-banner");
    const btnAccept = document.getElementById("accept-cookies");
    const btnRefuse = document.getElementById("refuse-cookies");

    function setCookie(name, value, days) {
        let expires = "";
        if (days) {
            const date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "")  + expires + "; path=/; SameSite=Strict";
    }

    if (banner && btnAccept && btnRefuse) {
        btnAccept.addEventListener("click", () => {
            setCookie("rgpd_consent", "true", 365);
            banner.style.display = "none";
            window.location.reload();
        });
        btnRefuse.addEventListener("click", () => {
            setCookie("rgpd_consent", "false", 365);
            banner.style.display = "none";
        });
    }
});
