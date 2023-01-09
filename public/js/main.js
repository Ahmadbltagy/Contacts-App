document.querySelector("#filter_company_id").addEventListener("change", (e) => {
    const companyId = e.target.value;
    window.location.href =
        window.location.href.split("?")[0] + `?company_id=${companyId}`;
});

document.querySelectorAll(".btn-delete").forEach((btn) => {
    btn.addEventListener("click", function (e) {
        e.preventDefault();
        if (confirm("Are you sure?")) {
            let action = this.getAttribute("href");
            let form = document.getElementById("form-delete");
            form.setAttribute("action", action);
            form.submit();
        }
    });
});
