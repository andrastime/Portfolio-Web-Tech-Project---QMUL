function toggleCover()
{
    let coverElem = document.getElementById("cover-container");
    let currHeight = coverElem.offsetHeight;

    if (currHeight == 0)
    {
        document.getElementById("cover-container").style.height = "100vh";
        console.log("opening");
    }
    else
    {
        document.getElementById("cover-container").style.height = 0;
        console.log("closing");
    }
}