function actionDelete (event){
    event.preventDefault();
    let urlRequest = $(this).data('url');
    let that =$(this);


    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: urlRequest,
                type:"GET",
                success : function (datadelete){
                    //vì resquest chỉ chuyển chuổi là json nên chúng ta phải giả mã no về object
                   datadelete= JSON.parse(datadelete);

                    if(datadelete.code==200){
                        that.parent().parent().remove();
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                },error: function (data) {

                }
            })

        }
    })
}
$(function (){
    $(document).on('click','.actionDelete',actionDelete);
})
