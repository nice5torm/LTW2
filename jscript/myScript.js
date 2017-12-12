$(document).ready()
{
    $("input[type='checkbox']").click
    (
        function(event)
        {
            var idItem = $(this).val();
            var checked = this.checked;

            alert(checked);

            $.post('../api/itemList.php', {idItem : idItem , checked : checked}, function(response)
            {
                // Do something with the request
            }, 'json');
        }
    );
}

