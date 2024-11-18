var view_update = new view_update()
function view_update()
{
    init()
     function init()
    {
        $(document).ready(function()
        {
            document_ready(); 
        
        });   
    }
    function document_ready()
    {
       
        get_view_id();
   
    }


    function get_view_id()
    {

        $(document).on('click','.update-button',function(e)
        {

        
            id=$(this).attr("update_id");

             $("a#update-link").attr("href","view_update.php?id="+id);
        });

    }
   
}