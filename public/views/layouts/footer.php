<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
        integrity="sha256-KM512VNnjElC30ehFwehXjx1YCHPiQkOPmqnrWtpccM=" crossorigin="anonymous"></script>
<script>
    $(function () {
        $("#firstList, #secondList").sortable({
            connectWith: "ul",
            placeholder: "placeholder",
            delay: 150,
            create: function (event, ui ) {
                addDataAttr();
            },
            update: function (event, ui) {

                addDataAttr();

                saveList();
            },
            receive: function(event, ui) {
                console.log('receive');
                addDataAttr();


                var pos = $(ui.item[0].outerHTML).data('position');
                var idItem = $(ui.item[0].outerHTML).data('index');


                addItemToList(ui.sender[0].id, ui.item[0].innerHTML, idItem, pos);

            }
        }).disableSelection();


    });

    function addDataAttr() {
        $(this).children().each(function (index) {
            if ($(this).attr('data-position') != (index+1)) {
                $(this).attr('data-position', (index+1)).addClass('updated');
            }
        });
    }

    function saveList() {
        var positions = [];
        $('.updated').each(function () {
            positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);
            $(this).removeClass('updated');
        });



        $.ajax({
            url: '/',
            method: 'POST',
            dataType: 'text',
            data: {
                update: 1,
                positions: positions
            },
            success: function () {
                console.log('ok')
            },
            error: function (error) {
                console.log(error);
            }
        })
    }

    function addItemToList(idList, title, id, pos) {


        $.ajax({
            url: '/add',
            method: 'POST',
            dataType: 'text',
            data: {
                add: 1,
                idList: idList,
                idItem: id,
                position: pos,
                title: title
            },
            success: function () {
                console.log('add')
            },
            error: function (error) {
                console.log(error);
            }
        })
    }


</script>
</body>
</html>