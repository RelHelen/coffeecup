// Сокращенный вариант

//выбор в списке услуг на странице booking/index
// выбираем контракт и отправляем данные на сервер на странице contracts/index
$('.select-vid').on('change', function() {
    var vidNomer = $(this).val(),
        //или
        //  contrNom1 = $(this).find('option').filter(':selected').data('nomer'),
        contrNom1 = $(this).find('option').filter(':selected').data('text');
    vidText = $(this).text();
    //console.log(vidNomer, contrNom1);
    $.ajax({
        url: path + '/booking/index',
        data: { id: vidNomer },
        type: 'GET',
        success: function(res) {
            showContracts(res);
        },
        error: function() {
            alert('Ошибка! Попробуйте позже');
        },
    });
    //$('#contrnum').text(path);
    //window.location = vidNomer;
    //window.location = booking;
    //console.log(contrNomer, contrId, contrText);
});

function showContracts(res) {
    console.log(res);
}

//выбор в списке договора на странице customer/view
$('.contrcust').on('click', function() {
    var contrNomer = $(this).data('id'),
        contrCust = $(this).data('cust');
    // var id=$(this).attr("id");
    //console.log(contrNomer);
    $.ajax({
        url: adminpath + '/customer/viewdet',
        data: { id: contrCust, idcontr: contrNomer },
        type: 'GET',
        success: function(res) {
            $('#a1').html(res);
        },
        error: function() {
            alert('Ошибка! Попробуйте позже');
        },
    });
});

window.addEventListener('scroll', scrollNav);

function scrollNav() {
    var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    if (scrollTop >= 170) {
        document.getElementById('navmenu').style.position = 'fixed';
        document.getElementById('navmenu').style.top = '0px';
    } else {
        document.getElementById('navmenu').style.position = 'static';
    }
}

// выбираем контракт и отправляем данные на сервер на странице contracts/index

// $('body').on('click', '.link-contracts', function (e) {
//   //e.preventDefault();
//   var id = $(this).data('id');
//   // console.log(id);

//   $.ajax({
//     url: path + '/contract/add',
//     data: { id: id },
//     type: 'GET',
//     success: function (res) {
//       showContracts(res);
//     },
//     error: function () {
//       alert('Ошибка! Попробуйте позже');
//     },
//   });
// });

function showContracts(res) {
    //  console.log(res);
}

//выбор в списке договора на странице contracts/view
$('.select-contracts').on('change', function() {
    var contrNomer = $(this).val(),
        //или
        //contrNom1 = $(this).find('option').filter(':selected').data('nomer'),
        contrText = $(this).text();

    //$('#contrnum').text(path);
    window.location = contrNomer;
    // console.log(contrNomer, contrId, contrText);
});

//удаление договора при нажатии на кнопку удалить на странице договор клинета 
$('#del-order').on('click', function() {
    let res = confirm('Подтвердите удаление');
    if (!res) return false; //если нажали отмена
});

$('.del-order').on('click', function() {
    let res = confirm('Подтвердите удаление');
    if (!res) return false; //если нажали отмена
});
$('#nav a').each(function() {
    let location1 = window.location.protocol + '//' + window.location.host + window.location.pathname;
    let link = this.href;

    if (link == location1) {
        $(this).parent().addClass('active');
        $(this).closest('.cn-dropdown-item').addClass('active');

    }

});