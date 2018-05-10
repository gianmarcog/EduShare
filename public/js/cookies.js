window.addEventListener("load", function () {
    window.cookieconsent.initialise({
        "palette": {
            "popup": {
                "background": "#ffffff",
                "text": "#adadad"
            },
            "button": {
                "background": "#004561",
                "border-radius": ".25rem"
            }
        },
        "position": "top",
        "static": true,
        "content": {
            "message": "Die EduShare Plattform benutzt Cookies um Login Daten und ähnliches zu Speichern.",
            "dismiss": "Akzeptieren",
            "link": "Details"
        }
    })
});