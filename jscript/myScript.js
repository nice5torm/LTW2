$(document).ready()
{
    $("input[type='checkbox']").click
    (
        function(event)
        {
            var idItem = $(this).val();
            var checked = this.checked;

            $.ajax
            (
                {
                    method: "POST",
                    url: '../api/itemList.php',
                    data: {idItem : idItem , checked : checked}
                }
            ).done(function(msg)
                {
                    console.log(msg);
                }
            )
            ;
        }
    );
}

