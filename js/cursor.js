cursor = document.getElementById("cursor");

function moveFrame(op)
{
    cursor.style.opacity = op;
    console.log(op)
}

setInterval(async function(){
    for (let i = 1; i >= 0; i-=0.01)
    {
         await setTimeout(moveFrame, 1000, i);
    }
    for (let i = 0; i <= 1; i+=0.01)
    {
         await setTimeout(moveFrame, 1000, i);
    }
}, 200)