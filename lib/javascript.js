$(document).ready(() => {

    const alertMessage = $("#alert-msg");
    if (alertMessage) {
        const closeMsg = $("#close-msg");
        closeMsg.on("click", () => {
            alertMessage.addClass("opacity-0");
            setTimeout(() => alertMessage.remove(), 400)
        });
        setTimeout(() => {
            alertMessage.removeClass("opacity-0");
            const countMsg = $("#count-msg");
            let count = 5;
            const interval = setInterval(() => {
                if (count > 0) {
                    count--
                    countMsg.text(count);
                } else {
                    alertMessage.addClass("opacity-0");
                    clearInterval(interval)
                    setTimeout(() => alertMessage.remove(), 400)
                }
            }, 1000);
        }, 1);
    }

    $("#addQuestion").on("click", () => {
        const newQuestion = $("#question-box div:last-child").clone();
        const lastQuestionNumber = Number($("#question-box div:last-child h6").text());
        const newQuestionNumber = lastQuestionNumber + 1;

        newQuestion.find('h6').text(newQuestionNumber);
        newQuestion.find('input').attr('name', `q-${newQuestionNumber}`).val("");
        newQuestion.find('button').attr("hidden", false);
        $("#question-box").append(newQuestion);
    });

    $(document).on("click", ".btn-remove", function () {
        $(this).parent().remove();
        $('#question-box div').each(function (index) {
            $(this).find('h6').text(index + 1);
            $(this).find('input').attr('name', `q-${index + 1}`);
        });
    });

    $("#form-message").on("submit",function(e){
        e.preventDefalut();
        console.log("asd");
        
        $(this).find("input").val("");
    })
});
