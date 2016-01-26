

// Adres do folderu z wszystkimi podstronami
var src = "/backend/"

/*
Funkcja ładująca górny pasek
*/
function loadNavbar()
{
	$("#navbar").load( src + '/menu/navbar.html' );
}
/*
Funkcja ładująca lewy panel
*/
function loadLeftpanel()
{
	$("#leftpanel").load( src + '/menu/leftpanel.html' );
}
/*
Funkcja ładująca zawartość
*/
function loadContent( link )
{	
	href = $(link).attr('href');
	// nie przetwarzaj dalej jeśli to ma byc wykonanie jakiegoś skryptu
	if (href.indexOf('javascript:') > -1)
		return;
	// popbieramy odnośnik
	href = href.replace("#", "");


	$('.se-pre-con').fadeIn("fast");
	$("#content").load( src + href , function() {
		$('.se-pre-con').fadeOut("slow");
	});
}

function dodajFilm() 
{

	// Kod HTML formularza
	// Można by było dodać adress do obrazka (teraz jest losowo pobierany przez PHP)
	body = '<form><div class="form-group">'+
	'Podaj tytuł filmu:'+
	'<input name="tytul" type="text" class="form-control" required>'+
	'Opis filmu:'+
	'<textarea name="opis" class="form-control" placeholder="Podaj opis filmu" required></textarea><hr>'+
	'Cena:'+
	'<input name="cena" type="number" step="0.01" class="form-control" style="width:100px" required>'+
	'Ocena:'+
	'<select id="selectbasic" name="ocena" class="form-control" style="width:100px" required>'+
      '<option value="1">1</option>'+
      '<option value="2">2</option>'+
      '<option value="3">3</option>'+
      '<option value="4">4</option>'+
      '<option value="5">5</option>'+
    '</select><input type=button style="display:none;">'+
	'</div></form>';

	  BootstrapDialog.show({
	  		title: 'Dodaj nowy film',
            message: body,
            buttons: [{
                icon: 'glyphicon glyphicon-send',
                label: 'Dodaj film',
                cssClass: 'btn-primary',
                autospin: true,
                action: function(dialogRef){
                    dialogRef.enableButtons(false);
                    dialogRef.setClosable(false);
                	// Pobieramy uzupełnione elementy formy
                	var dane = dialogRef.getModalBody().find('form').serialize();
                	
                	//Wysyłamy zapytanie POST w celu dodania nowego filmu
                	$.post( "test.php", dane )
					  .done(function( data ) {
					    alert( "Data Loaded: " + data );
					  });


                    //dialogRef.getModalBody().html('Dialog closes in 5 seconds.');
                    setTimeout(function(){
                        dialogRef.close();
                    }, 5000);
                }
            }, {
                label: 'Anuluj',
                action: function(dialogRef){
                    dialogRef.close();
                }
            }]
        });
        
}