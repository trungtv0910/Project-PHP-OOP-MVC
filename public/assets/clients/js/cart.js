function addToCart (event){
    event.preventDefault();
    let urlRequest = $(this).data('url');
    let that =$(this);

            $.ajax({
                url: urlRequest,
                type:"POST",
                data:{
                    name:$('#prodName').val(),
                    price:$('#prodPrice').val(),
                    image:$('#prodImage').val(),
                    qty:$('#sst').val()
                },
                success : function (response){

                    console.log(response);
                    //vì resquest chỉ chuyển chuổi là json nên chúng ta phải giả mã no về object
                    response= JSON.parse(response);

                    if(response.code==200){
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Đã thêm vào giỏ hàng',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                },error: function (response) {

                }
            })


}function loginToAdd (event){
    // ở đây chưa có thời gian để xữ lý sự kiên chuyển trang khi chưa đăng nhập, tuy nhiên vì có middeware nên nó sẽ tự chuyển sang login
    event.preventDefault();
    let urlRequest = $(this).data('url');
    let that =$(this);

    $.ajax({
        url: urlRequest,
        type:"POST",
        data:{
            name:$('#prodName').val(),
            price:$('#prodPrice').val(),
            image:$('#prodImage').val(),
            qty:$('#sst').val()
        },
        success : function (response){

            console.log(response);
            //vì resquest chỉ chuyển chuổi là json nên chúng ta phải giả mã no về object
            response= JSON.parse(response);

            if(response.code==200){
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Đã thêm vào giỏ hàng',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        },error: function (response) {

        }
    })


}
function deleteProdCart(event){
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
                success : function (response){
            //         //vì resquest chỉ chuyển chuổi là json nên chúng ta phải giả mã no về object
                    response= JSON.parse(response);
                    if(response.code==200){
                        that.parent().parent().remove();
                        $(document).ready(function() {
                            let total_pro =0;
                            let  total = $('.table').find('.total_prod');
                            total.each(function() {
                                total_pro += parseInt($(this).val());
                            });
                           let x= $('.table').find('#total_all')[0].innerText= numberWithCommas(total_pro) +'đ';

                        });
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }

                }
            })

        }
    })

}
function updateprice(){

}
// function updateQty(sst,id,urlRequest){
//
//     console.log(sst+'----'+id);
//     console.log(urlRequest);
//     // $.ajax({
//     //     url: urlRequest,
//     //     type:"POST",
//     //     data:{
//     //        qty:sst
//     //     },
//     //     success : function (response){
//     //         console.log(response);
//     //         //vì resquest chỉ chuyển chuổi là json nên chúng ta phải giả mã no về object
//     //         response= JSON.parse(response);
//     //
//     //         if(response.code==200){
//     //             Swal.fire({
//     //                 position: 'top-end',
//     //                 icon: 'success',
//     //                 title: 'Đã thêm vào giỏ hàng',
//     //                 showConfirmButton: false,
//     //                 timer: 1500
//     //             })
//     //         }
//     //     },error: function (response) {
//     //
//     //     }
//     // })
//
// }

$(function (){
    $(document).on('click','.addToCart',addToCart);
    $(document).on('click','.deleteProdCart',deleteProdCart);


})
function numberWithCommas(x) {
    x = x.toString();
    var pattern = /(-?\d+)(\d{3})/;
    while (pattern.test(x))
        x = x.replace(pattern, "$1.$2");
    return x;
}