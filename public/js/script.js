
const btn = document.querySelector("#createbtn");
if(btn){
    btn.addEventListener("click",myhendler);
}

function myhendler(e){
    e.defaultPrevented;
    let formData = new FormData(document.forms.taskform);
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "/tasks");
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status != 200) {
            console.log(`Ошибка ${xhr.status}: ${xhr.statusText}`);
        } else {
            console.log(`Готово, получили ${xhr.response.length} байт`);
            console.log(`Готово, получили сообщение ${xhr.response}`);
            const result = document.querySelector("#result");
            result.innerHTML = "Задача сохранена";
            document.getElementById("createbtn").disabled = true;
        }
    };
    xhr.onerror = function() {
        console.log("Запрос не удался");
    };
}

/*
const updatebtn = document.querySelector("#updatebtn");
if(updatebtn){
    updatebtn.addEventListener("click",updatebtnhendler);
}
*/
function updatebtnhendler(e){
    e.defaultPrevented;
    let formData = new FormData(document.forms.taskform);
    let xhr = new XMLHttpRequest();
    let updatetaskid = document.forms.updatetaskform.updatetaskid.value;
    let route = `/tasks/${updatetaskid}`
    console.log(route);
    xhr.open("PUT", route);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status != 200) {
            console.log(`Ошибка ${xhr.status}: ${xhr.statusText}`);
        } else {
            console.log(`Готово, получили ${xhr.response.length} байт`);
            console.log(`Готово, получили сообщение ${xhr.response}`);
            const result = document.querySelector("#result");
            result.innerHTML = "Задача сохранена";
            document.getElementById("createbtn").disabled = true;
        }
    };
    xhr.onerror = function() {
        console.log("Запрос не удался");
    };
}

/*
( function( $ ) {
    $(document).ready(function () {

        $( "#updatebtn" ).on( "click", mysend );

        function mysend(e){
            e.defaultPrevented;

            let formData = new FormData(document.forms.updatetaskform);
            let updatetaskid = document.forms.updatetaskform.updatetaskid.value;
            console.log(updatetaskid)

            $.ajax({
                url: '/tasks/'+updatetaskid,
                method: 'post',
                dataType: 'html',
                data: formData,
                success: function(){
                    console.log(`Готово, получили ${xhr.response.length} байт`);
                    console.log(`Готово, получили сообщение ${xhr.response}`);
                    const result = document.querySelector("#result");
                    result.innerHTML = "Задача изменена и сохранена";
                    document.getElementById("updatebtn").disabled = true;
                }

            });

        }

    });
}( jQuery ) );
*/
