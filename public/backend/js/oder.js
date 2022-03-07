function actionDelete(event){
    event.preventDefault();
    Swal.fire({
        title: 'Bạn có chắc chắn muốn mua hàng?',
        text: "Bạn sẽ không thể phục hồi!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Mua hàng!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Deleted!',
                'Bạn vừa mua hàng',
                'Thành công'
            )
        }
    })
}

$(function (){
    $(document).on('click',' .action_click',actionDelete);
})
