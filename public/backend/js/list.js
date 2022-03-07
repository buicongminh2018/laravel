function actionDelete(event){
    event.preventDefault();
    let urlRequest= $(this).data('url');
    let that= $(this);
    Swal.fire({
        title: 'Bạn có chắc là xóa mục này không?',
        text: "Bạn sẽ không thể phục hồi mục này",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Chắc chắn'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'GET',
                url: urlRequest,
                success: function (data){
                    if(data.code ==200){
                        that.parent().parent().remove();

                    }

                },
                error: function (){

                }

            })
            // Swal.fire(
            //     'Deleted!',
            //     'Your file has been deleted.',
            //     'success'
            // )
        }
    })

}
$(function (){
   $(document).on('click',' .action_delete',actionDelete);
});
