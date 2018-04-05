/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$('#delete-modal').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget);
    var id = button.data('customer');

    var modal = $(this);
    modal.find('.modal-title').text('Excluir Produto #' + id);
    modal.find('#confirm').attr('href', '../pages/delete.php?id=' + id);
});




