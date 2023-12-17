let formTitle = document.getElementById("blog-title");
let formBody = document.getElementById("blog-body");

function clearForm()
{
    if (window.confirm("Are you sure you want to clear your current blog entry?"))
    {
        formTitle.value = "";
        formBody.value = "";
    }
}
function stopBlink()
{
    formTitle.classList.remove("highlight");
    formBody.classList.remove("highlight");
}

function preventDefault()
{
    if (formTitle.value.length < 1 || formBody.value.length < 1)
    {
        formTitle.classList.add("highlight");
        formBody.classList.add("highlight");
        setTimeout(function() {
            stopBlink();
            formTitle.classList.add("highlight-solid");
            formBody.classList.add("highlight-solid");
        }, 3000);

        document.getElementById("emptyFields").style.opacity = 1;

        return false;
    }
    return true;
}