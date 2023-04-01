function navigateToViewRoom(){
    window.location.href = "../src/viewroom.php";
}

function navigateBack(){
    window.location.href = "../src/index.php";
}


function cardSelected(e){
    // console.log(e);
    window.location.href = "../src/room.php?roomname="+e;
}