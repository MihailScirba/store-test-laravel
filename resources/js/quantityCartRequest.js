$('.increment').click(function () {
    this.parentNode.querySelector('input[type=number]').stepUp()
    let itemId = $(this).data('id')
    $.ajax({
        url: 'http://localhost/crud_test/public/shop/cart/${itemId}/item-quantity/increment',
        type: 'POST',
        data: {
            _token: csrf_token()
        },
        success: function (response) {
            console.success('Incremented')
        },
        error: function (xhr, status, error) {
            console.error(xhr);
            console.error(status);
            console.error('Error incrementing quantity:', error);
            alert(error._token, '\n', error.data)
        }
    })
})

$('.decrement').click(function () {
    this.parentNode.querySelector('input[type=number]').stepDown()
    let itemId = $(this).data('id')
    $.ajax({
        url: '',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}'
        },
        success: function (response) {
            console.success('Decremented')
        },
        error: function (xhr, status, error) {
            console.error('Error incrementing quantity:', error);
            alert('Something went wrong')
        }
    })
})
