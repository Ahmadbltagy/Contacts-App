document.querySelector("#filter_company_id").addEventListener("change", (e) => {
    const companyId = e.target.value;
    window.location.href =
        window.location.href.split("?")[0] + `?company_id=${companyId}`;
});
