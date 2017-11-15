

<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Verificar PDF</h4>
      </div>
      <div class="modal-body" id="modal-pdf-body">
      	<div>
      	  <button id="prev">Previous</button>
      	  <button id="next">Next</button>
      	  &nbsp; &nbsp;
      	  <span>Page: <span id="page_num"></span> / <span id="page_count"></span></span>
      	</div>
        <canvas id="the-canvas" style="width: 100%;"></canvas>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>



<h1 class="page-header">Oficialía de Partes</h1>
<form name="recepciones" method="post" action="" role="form" enctype="multipart/form-data">
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-md-4"><h4>Registro de Documentos para Dependencia Externa</h4></div>
			<div class="col-md-8 text-right">
			    <input style="width: 100px;height:40px;background: #8c1b67;border-color: #8c1b67;" type="submit" id="btn_enviar_oficio" name="btn_enviar_oficio" class="btn btn-primary" name="btn_busca" value="Enviar" />
			    <input style="width: 100px;height:40px;background: #8c1b67;border-color: #8c1b67;" type="submit" id="btn_guardar_oficio" name="btn_guardar_oficio" class="btn btn-primary" name="btn_busca" value="Guardar" />
			    <button style="width: 100px;height:40px;background: #8c1b67;border-color: #8c1b67;" type="button" class="btn btn-primary" id="btn_regresar">Regresar</button>
			</div>
		</div>
		
		
	</div>
	<div class="panel-body">
		<?php
			if($result != ''){
				echo $result;
			} 
		?>
		
			<div class="row">
				<div class="col-md-6">
		            <div class="form-group">
		                <label for="recepciones_nombreEmisor" class="required">Origen</label>
		                <select class="form-control input-sm" name="origen" id="origen" disabled >
		                  <option value="1" <?php if($data['privilegios'] == 3 || $data['privilegios'] == 2) echo "selected" ?>>Interno</option>
		                </select>
		                <input type="hidden" id="select_origen" name="select_origen" value="<?php if($data['privilegios'] == 1) echo "2"; else echo "1"  ?>">
		                <span class="text-danger"></span>
		            </div>		            
		            <div id="formInterno" >
		    		    <div class="form-group">
		    		        <label for="" class="required">Área Origen:</label>
		    		        <select class="form-control input-sm" name="area_origen" id="area_origen" disabled>
		        			    <option value=""><?php echo $data['area_usuario']->area; ?></option>
		                    </select>
		    		        <span class="text-danger"></span>
		    		    </div>

					    <div class="form-group">
					        <label for="recepciones_institucionEmisor" class="required">Usuario Origen:</label>
					        <input type="text" id="usuario_origen" name="usuario_origen" readonly="" required="required" maxlength="50" class="form-control input-sm" placeholder="Usuario Destino" value="<?php echo ucwords(mb_strtolower($data['area_usuario']->nombre_formal,'UTF-8'));?>" />
					        <input type="hidden" id="id_usuario_origen" name="id_usuario_origen" value="<?php echo $data['area_usuario']->id_usuario ?>">
					        <input type="hidden" id="destino" name="destino" value="EXTERNO">
					        <span class="text-danger"></span>
					    </div>


		            </div>

		            <div id="formExterno">
			            <div class="form-group">
			                <label for="recepciones_nombreEmisor" class="required" id="lbl_nombre_emisor">Nombre quien Recibe:</label>
			                <input type="text" id="nombre_emisor" name="nombre_emisor"  maxlength="50" class="form-control input-sm" placeholder="Nombre del Titular del Oficio"  data-validacion-tipo="alfa|requerido|min:10"/>
			                <span class="text-danger"></span>
			            </div>
			            
					    <div class="form-group" id="box_cargo">
					        <label for="recepciones_institucionEmisor" class="required">Cargo:</label>
					        <input type="text" id="cargo_emisor" name="cargo_emisor"  maxlength="50" class="form-control input-sm" placeholder="Nombre del cargo del Titular" data-validacion-tipo="alfa|requerido|min:5" />
					        <span class="text-danger"></span>
					    </div>

					    <div class="form-group ">
					        <label for="institucion_emisor" id="lbl_institucion_emisor" class="required">Institución:</label>
					        <input type="text" id="institucion_emisor" name="institucion_emisor"  maxlength="50" class="form-control input-sm" placeholder="Institucion del Titular" data-validacion-tipo="alfa|requerido|min:5" />
					        <span class="text-danger"></span>
					        <!-- <div class="ui-widget" style="margin-top:2em; font-family:Arial">
					          Result:
					          <div id="log" style="height: 200px; width: 300px; overflow: auto;" class="ui-widget-content"></div>
					        </div> -->
					    </div>
			    	    <div class="form-group">
			    	    	<div class="radio"  >
			    	    	  <label>
			    	    	    <input type="radio" name="respuesta" id="respuesta" value="0" data-validacion-tipo="requerido">
			    	    	    Para su Conocimiento y Archivo
			    	    	  </label>
			    	    	</div>

			    	    	<div class="radio"  >
			    	    	  <label>
			    	    	    <input type="radio" name="respuesta" id="respuesta" value="1" data-validacion-tipo="requerido">
			    	    	    	Para el trámite que corresponda	
			    	    	  </label>
			    	    	</div>
			    	    </div>
		            </div>
					
					
				</div>
				<div class="col-md-6">					
				    
				    <div class="form-group has-feedback" id="box_num_oficio" >
				        <label for="recepciones_institucionEmisor" class="required">Número de Oficio:</label>
				        <input type="text" id="folio_iepc" name="folio_iepc"  maxlength="20" class="form-control input-sm" placeholder="Número de Oficio"  data-validacion-tipo="min:3" value="S/N"/>
				        <span class="text-danger"></span>
				    </div>
				    <div class="form-group">
				      <label for="exampleInputFile">Asunto:</label> <span style="font-size: 9px;"> Máximo 150 carácteres</span>			      
				      <!-- <input type="file" name="archivo" id="documento_iepc" required="required"> -->
				      <textarea class="form-control input-sm"  name="asunto_oficio" id="asunto_oficio" maxlength="150" placeholder="Asunto del Oficio" style="height: 100px;" data-validacion-tipo="alfa-numerico|requerido|min:10"></textarea>
				    </div>


				    <div class="form-group">
				      <label for="exampleInputFile">Comentarios:</label><span style="font-size: 9px;"> Máximo 255 carácteres</span>			      
				      <!-- <input type="file" name="archivo" id="documento_iepc" required="required"> -->
				      <textarea class="form-control input-sm"  name="comentarios" id="comentarios" placeholder="Asunto del Oficio" style="height: 100px;" data-validacion-tipo="alfa-numerico" maxlength="255"></textarea>
				    </div>

				    <div class="form-group">
				    
				      <img src="AI/image/pdf.jpg" class="img-responsive" alt="Responsive image" style="margin-left:auto;margin-right: auto; height: 82px; ">
				    </div>
				    <div class="form-group" style="text-align: center; ">
				      <span class="btn btn-default btn-file"><span>Seleccionar Archivo</span><input type="file" accept="application/pdf" name="archivo" id="documento_iepc" required="required" /></span>
				      <button id="verPdf" type="button" class="btn btn-default" data-dismiss="modal" style="width: 100px;">Visualizar</button>
				    </div>
				    <div class="form-group" style="text-align: center;">
				    	<span class="fileinput-filename"></span><span class="fileinput-new" style="font-weight: 700;">No se eligió archivo</span>
				    	
				    </div>
					
				</div>
			</div>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-md-12"><h4><strong>Seleccionar usuarios que recibirán copia</strong></h4></div>
		</div>
	</div>
	<div class="panel-body">
		<div class="row">		

			<div class="col-md-12">
				<div class="form-group">
					
					<div class="form-group" id="lista_usuarios" >
						<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			    	        <thead>
			    	            <tr>
			    	            	<th></th>
			    	            	<th></th>
			    	            	<th></th>
			    	                <th>Nombre</th>
			    	                <th>Area</th>
			    	            </tr>
			    	        </thead>
			    	        <tbody>
			    	        	<?php foreach($data['usuarios'] as $u): ?>
			    	        	   <tr>
										<td></td>
										<td class="usuario_select"><?php echo $u->id_usuario; ?></td>
										<td ><?php echo $u->titular; ?></td>
									    <td><?php echo ucwords(mb_strtolower($u->nombre_formal,'UTF-8')) ?></td>
									    <td><?php echo $u->area; ?></td>
									</tr>
			    	        	<?php endforeach; ?>
			    	        </tbody>
				    	</table>
					</div>						
				</div>
			</div>
		</div>
	</div>
</div>
</form>
<script>
	$(document).ready(function(){ 
			$( "#btn_regresar" ).click(function() {
				window.history.go(-1);
			});
			var subm = "";
			 $('input[type="submit"]').click(function(e) {
			   subm = e.target.id;
			 });
			//Evento para validar campos
			$("form").submit(function( event ) {
				if(subm == "btn_enviar_oficio")
					enviar = 1;
				else
					enviar= 0;
				var res = $(this).validate();
				if(res){
					var formData = new FormData($(this)[0]);

					var arrCheck = [];

	    			$('#example').DataTable().$('tr, td').each(function (){
	    				if($(this).hasClass('success-usuarios') == true){
	    					// console.log($('#example').dataTable().fnGetData( this ));
	    					arrCheck.push(parseInt($('#example').dataTable().fnGetData( this )[1]));	    					
	    				}
	    			});


					formData.append('check', arrCheck);
					formData.append('enviar', enviar);

				    if(enviar){
				    	bootbox.confirm({
				    	    title: "Advertencia",
				    	    message: "El mensaje será enviado a todos los destinatarios. Los cambios no se pondrán deshacer.<br> ¿Desea continuar?",
				    	    buttons: {              
				    	        cancel: {
				    	            label: 'No',
				    	            className: 'btn-danger'
				    	        },
				    	        confirm: {
				    	            label: 'Si',
				    	            className: 'btn-success'
				    	        }
				    	    },
				    	    type: "warning",
				    	    callback: function (result) {
				    	        if(result){
				    	        	enviarSolicitud(formData,enviar);
				    	        }
				    	    }
				    	});
				    }
				    else{
				    	enviarSolicitud(formData,enviar,event)
				    }		
				}

			    event.preventDefault();
		    });


	    	function enviarSolicitud(formData,enviar,event){
	    		$.ajax({
	    		    // url: '?c=OfcPartes&a=Guardar',
	    		    url: GLOBAL_PATH+"ofcpartes/guardar",
	    		    type: 'POST',
	    		    data: formData,
	    		    beforeSend: function(){
	    		    	CustomLoadingShow("Guardando...");
	    		    },
	    		    success: function (data) {
	    		    	// event.preventDefault();
	    		    	CustomLoadingClose();
	    		    	respuesta = JSON.parse(data); 
	    		    	if(respuesta.success){
	    		    		if(enviar){
	    		    			socket.emit( 'notification', respuesta.notificacion );	    		        			
	    		    		}
	    		    		bootbox.alert({ 
	                          title: "Atención",
	                          message: enviar ? "Solicitud Enviada Correctamente": "Solicitud Guardada Correctamente",
	                          type: "success",
	                          callback: function(){ 
	                          	window.location.href = GLOBAL_PATH+"ofcpartes/index"
	                          }
	                        })


	    		    		
	    		    	}
	    		    	else{
	    		    		bootbox.alert({ 
	                          title: "Advertencia",
	                          message: respuesta.msg_error,
	                          type: "danger",
	                          callback: function(){ 
	                          	window.location.href = GLOBAL_PATH+"ofcpartes/add";
	                          }
	                        })    		    		
	    		    	}
	    		    },
	    		    cache: false,
	    		    contentType: false,
	    		    processData: false
	    		});

	    	}
			$('.form-control').bind('blur', function () {
			    return $(this).validateBlur();
			});

			$('input[type=radio][name=respuesta]').change(function() {

	    		/* El control donde vamos agregar el texto */
                var small = $('<small />');
    	        /* El contenedor del control */
    	        var obj  = $(this);
    	        var form_group = obj.closest('.form-group');
    	        form_group.removeClass('has-error'); /* Limpiamos el estado de error */

    	        /* Capturamos el label donde queremos mostrar el mensaje */
    	        var label = form_group.find('label');
    	        label.find('small').remove(); /* Eliminamos el mensaje anterior */
    	        label.append(small);
    	    });
			$('#folio_iepc').bind('blur', function () {
			    return $(this).validateNumOficio();
			});
			//Evento para visualizar pdf al crear registro
		    $(function(){
		        $("#verPdf").click(loadPreviews_click);
		    })

		    function loadPreviews_click(e) {
		        $("#documento_iepc").each(function() {
		            var $input = $(this);
		            var files = this.files;
		            console.log(files);
		            if(files == undefined || files.length == 0) return;
		            //var files = files[0];            
		            
		            // FileReader support
		            //if (FileReader && files && files.length) {
		                  //console.log('aquiiiiiiiiiiiiiii');
		                  var fr = new FileReader();
		                  var extension = files[0].name.split('.').pop().toLowerCase();
		                  fr.onload = function(e) {
		                    success = fileTypes.indexOf(extension) > -1;
		                    if (success) {

		                      PDFJS.getDocument(e.target.result).then(function(pdfDoc_) {
		                        pdfDoc = pdfDoc_;
		                        document.getElementById('page_count').textContent = pdfDoc.numPages;

		                        // Initial/first page rendering
		                        renderPage(pageNum);
		                      });
		                    }

		                  }
		                  fr.onloadend = function(e) {
		                    console.debug("Load End");
		                  }
		                  fr.readAsArrayBuffer(files[0]);
		             //}

		            
		        });
		    }


		    var fileTypes = ['pdf'];  //acceptable file types
		    
		    $("input:file").change(function (evt) {
		      /*var parentEl = $("#modal-pdf-body");
		      console.log(parentEl);*/     
		      var tgt = evt.target || window.event.srcElement,
		                      files = tgt.files;
		      console.log(files[0].name); 

		      $(".fileinput-new").text(files[0].name)
		            
		    });


		    var pdfDoc = null,
		        pageNum = 1,
		        pageRendering = false,
		        pageNumPending = null,
		        scale = 2,
		        canvas = document.getElementById('the-canvas');
		        ctx = canvas.getContext('2d');

		    /**
		     * Get page info from document, resize canvas accordingly, and render page.
		     * @param num Page number.
		     */
		    function renderPage(num) {
		      pageRendering = true;
		      // Using promise to fetch the page
		      pdfDoc.getPage(num).then(function(page) {
		        var viewport = page.getViewport(scale);
		        canvas.height = viewport.height;
		        canvas.width = viewport.width;

		        // Render PDF page into canvas context
		        var renderContext = {
		          canvasContext: ctx,
		          viewport: viewport
		        };
		        var renderTask = page.render(renderContext);

		        // Wait for rendering to finish
		        renderTask.promise.then(function() {
		          console.log("termino de cargar");

		          $('#myModal').modal({
		                  show:true,
		                  backdrop:'static',
		              });
		          pageRendering = false;
		          if (pageNumPending !== null) {
		            // New page rendering is pending
		            renderPage(pageNumPending);
		            pageNumPending = null;
		          }
		        });
		      });

		      // Update page counters
		      document.getElementById('page_num').textContent = pageNum;
		    }

		    /**
		     * If another page rendering in progress, waits until the rendering is
		     * finised. Otherwise, executes rendering immediately.
		     */
		    function queueRenderPage(num) {
		      if (pageRendering) {
		        pageNumPending = num;
		      } else {
		        renderPage(num);
		      }
		    }

		    /**
		     * Displays previous page.
		     */
		    function onPrevPage() {
		      if (pageNum <= 1) {
		        return;
		      }
		      pageNum--;
		      queueRenderPage(pageNum);
		    }
		    document.getElementById('prev').addEventListener('click', onPrevPage);

		    /**
		     * Displays next page.
		     */
		    function onNextPage() {
		      if (pageNum >= pdfDoc.numPages) {
		        return;
		      }
		      pageNum++;
		      queueRenderPage(pageNum);
		    }
		    document.getElementById('next').addEventListener('click', onNextPage);

		    /**
		     * Asynchronously downloads PDF.
		     */

		     //Eventos de los buscadores
				$( function() {

				    $.widget( "custom.catcomplete", $.ui.autocomplete, {
	    		          _create: function() {
	    		            this._super();
	    		            this.widget().menu( "option", "items", "> :not(.ui-autocomplete-category)" );
	    		          },
	    		          _renderItem: function( ul, item ) {
	    		            return $( "<li class='autocomplete-child'>" )
	    		              .attr( "data-value", item.value )
	    		              .append( "Firma: " +item.nombre_emisor + " Cargo: " +item.cargo)
	    		              .appendTo( ul );
	    		          },
	    		          _renderMenu: function( ul, items ) {
	    		            var that = this,
	    		              currentCategory = "";
	    		            $.each( items, function( index, item ) {
	    		              var li;
	    		              if ( item.nombre_emisor != currentCategory ) {
	    		                ul.append( "<li class='ui-autocomplete-category'>" + item.label + "</li>" );
	    		                currentCategory = item.nombre_emisor;
	    		              }
	    		              li = that._renderItemData( ul, item );
	    		              if ( item.nombre_emisor ) {
	    		                li.attr( "aria-label", item.nombre_emisor + " : " + item.label );
	    		              }
	    		            });
	    		          }
	    		        });
	    		 
	    		    $( "#institucion_emisor" ).catcomplete({
	    		      // source: "?c=OfcPartes&a=buscadorInstitucion",
	    		      //source: GLOBAL_PATH+"ofcpartes/buscadorInstitucion",
	    		      source: function( request, response ) {
	    		          $.ajax({
	    		              url: GLOBAL_PATH+"ofcpartes/buscadorInstitucion",
	    		              type: 'POST',
	    		              data: {term: request.term},
	    		              dataType: "json",
	    		              success: function( data ) {
	    		                  response(data);
	    		              }
	    		          });
	    		      },
	    		      minLength: 3,
	    		      select: function( event, ui ) {
	    		      	console.log(ui);
	    		      	$("#nombre_emisor").val(ui.item.nombre_emisor);
	    		      	$("#cargo_emisor").val(ui.item.cargo);
	    		      	$("#institucion_emisor").val(ui.item.value);
	    		        //log( "Selected: " + ui.item.value + " aka " + ui.item.id );
	    		      }
	    		    });

	    		    $.widget( "custom.catcompleteNombre", $.ui.autocomplete, {
	    		          _create: function() {
	    		            this._super();
	    		            this.widget().menu( "option", "items", "> :not(.ui-autocomplete-category)" );
	    		          },
	    		          _renderItem: function( ul, item ) {
	    		            return $( "<li class='autocomplete-child'>" )
	    		              .attr( "data-value", item.value )
	    		              .append( "Institucion: " +item.institucion_emisor + " Cargo: "+item.cargo)
	    		              .appendTo( ul );
	    		          },
	    		          _renderMenu: function( ul, items ) {
	                      var that = this,
	                        currentCategory = "";
	                      $.each( items, function( index, item ) {
	                        var li;
	                        if ( item.institucion_emisor != currentCategory ) {
	                          ul.append( "<li class='ui-autocomplete-category '>" + item.label + "</li>" );
	                          currentCategory = item.institucion_emisor;
	                        }
	                        li = that._renderItemData( ul, item );
	                        if ( item.institucion_emisor ) {
	                          li.attr( "aria-label", item.institucion_emisor + " : " + item.label );
	                        }
	                      });
	                    }
	    		        });
	    		 
	    		    $( "#nombre_emisor" ).catcompleteNombre({
	    		      // source: "?c=OfcPartes&a=buscadorEmisor",
	    		      // source: GLOBAL_PATH+"ofcpartes/buscadorEmisor",
	    		      source: function( request, response ) {
	    		          $.ajax({
	    		              url: GLOBAL_PATH+"ofcpartes/buscadorEmisor",
	    		              type: 'POST',
	    		              data: {term: request.term},
	    		              dataType: "json",
	    		              success: function( data ) {
	    		                  response(data);
	    		              }
	    		          });
	    		      },
	    		      minLength: 3,
	    		      select: function( event, ui ) {
	    		      	console.log(ui);
	    		      	$("#nombre_emisor").val(ui.item.value);
	    		      	$("#cargo_emisor").val(ui.item.cargo);
	    		      	$("#institucion_emisor").val(ui.item.institucion_emisor);
	    		        //log( "Selected: " + ui.item.value + " aka " + ui.item.id );
	    		      }
	    		    });

	    		    $.widget( "custom.catcompleteCargo", $.ui.autocomplete, {
	    		          _create: function() {
	    		            this._super();
	    		            this.widget().menu( "option", "items", "> :not(.ui-autocomplete-category)" );
	    		          },
	    		          _renderItem: function( ul, item ) {
	    		            return $( "<li class='autocomplete-child'>" )
	    		              .attr( "data-value", item.value )
	    		              .append( "Firma: " +item.nombre_emisor + " Institucion: " +item.institucion_emisor)
	    		              .appendTo( ul );
	    		          },
	    		          _renderMenu: function( ul, items ) {
	                      var that = this,
	                        currentCategory = "";
	                      $.each( items, function( index, item ) {
	                        var li;
	                        if ( item.institucion_emisor != currentCategory ) {
	                          ul.append( "<li class='ui-autocomplete-category '>" + item.label + "</li>" );
	                          currentCategory = item.institucion_emisor;
	                        }
	                        li = that._renderItemData( ul, item );
	                        if ( item.institucion_emisor ) {
	                          li.attr( "aria-label", item.institucion_emisor + " : " + item.label );
	                        }
	                      });
	                    }
	    		        });
	    		 
	    		    $( "#cargo_emisor" ).catcompleteCargo({
	    		      // source: "?c=OfcPartes&a=buscadorCargo",
	    		      source: function( request, response ) {
	    		          $.ajax({
	    		              url: GLOBAL_PATH+"ofcpartes/buscadorCargo",
	    		              type: 'POST',
	    		              data: {term: request.term},
	    		              dataType: "json",
	    		              success: function( data ) {
	    		                  response(data);
	    		              }
	    		          });
	    		      },
	    		      minLength: 3,
	    		      select: function( event, ui ) {
	    		      	console.log(ui);
	    		      	$("#nombre_emisor").val(ui.item.nombre_emisor);
	    		      	$("#cargo_emisor").val(ui.item.value);
	    		      	$("#institucion_emisor").val(ui.item.institucion_emisor);
	    		        //log( "Selected: " + ui.item.value + " aka " + ui.item.id );
	    		      }
	    		    });


				  } );




	});
	
</script>