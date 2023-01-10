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

document.getElementById("btn-clear").addEventListener("click", (e) => {
    let search = document.getElementById("search"),
        select = document.getElementById("filter_company_id");
    search.value = " ";
    window.location.href = window.location.href.split("?")[0];
});

document.getElementById("btn-clear").style.display = "none";

document.getElementById("search").addEventListener("input", (e) => {
    let select = document.getElementById("filter_company_id");
    select.selectedIndex = 0;
    console.log(select.selectedIndex);
    if (e.target.value) {
        document.getElementById("btn-clear").style.display = "block";
    } else {
        window.location.href = window.location.href.split("?")[0];
        document.getElementById("btn-clear").style.display = "none";
    }
});
const toggle = () => {
    let query = location.search,
        pattern = /[?&]search=/;

    if (pattern.test(query)) {
        document.getElementById("btn-clear").style.display = "block";
    }
};
toggle();
