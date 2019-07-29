<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
        integrity="sha256-KM512VNnjElC30ehFwehXjx1YCHPiQkOPmqnrWtpccM=" crossorigin="anonymous"></script>
<script>
    $(function () {

        const getLists = () => {
            let countList = $('.connectedSortable').length;
            for (let i = 0; i < countList; i++) {
                $.getJSON('/getList/' + i, function(data){
                    [data] = data;

                    let countItems = Object.keys(data).length;

                    if (countItems !== 0) {

                        for (let j = 0; j < countItems; j++) {
                            let item = data[j];

                            $('#list' + i).append("<li class='facet' data-index='" + item.id + "' data-position='" + +(item.position) + "'>" + item.title + "</li>");

                        }

                    }
                });

            }
        };

        const addDataAttr = (element) => {

            element.children().each(function (index) {
                if (+($(this).attr('data-position')) !== (index + 1)) {
                    $(this).attr('data-position', (index + 1)).addClass('updated');
                }
            });
        };

        const saveList = (idList) => {

            let positions = [];

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
                    positions: positions,
                    idList: idList
                },
                success: function () {
                    console.log('update')
                },
                error: function (error) {
                    console.log(error);
                }
            })
        };

        const addItemToList = (idList, title, id, pos) => {

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
        };

        getLists();

        $("#list0, #list1").sortable({
            connectWith: ".connectedSortable",
            placeholder: "placeholder",
            delay: 150,
            update: function (event, ui) {
                let idList = $(ui.item[0]).parent().attr('id');
                let element = $(this);
                addDataAttr(element);

                saveList(idList);
            },
            receive: function (event, ui) {
                let element = $(this);
                addDataAttr(element);

                let pos = $(ui.item[0].outerHTML).data('position');
                let idItem = $(ui.item[0].outerHTML).data('index');

                addItemToList(ui.sender[0].id, ui.item[0].innerHTML, idItem, pos);
            }

        }).disableSelection();
    });

</script>
</body>
</html>