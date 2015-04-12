var dataTables = function (){
	return{
		reloadDataTable :  function (tableId){
				jQuery(tableId).DataTable().ajax.reload(null, true);
		},
		removeRow : function (tableId,rowId){
				var dt = jQuery(tableId).DataTable();
				var row = dt.row(jQuery(tableId).find('tr#'+rowId));
				row.remove().draw();
				jQuery('.modal').modal('hide')
		},
		kategoriler : function (){
		    jQuery('#kategorilerTable').dataTable( {
		        "ajax": app.getBase() + "admin/kategori/dataTableListele",
	            "language": {
	                "url":"//cdn.datatables.net/plug-ins/1.10.6/i18n/Turkish.json"
	            },
		        "deferRender": true,
		        "aaSorting": [],
		        "aoColumns": [
		                      {
					               "sTitle" : "Kategori Adı",
					               "mData": "ad" 
					               
					          },
					          {
					        	  "sTitle" : "Yönet",
					        	  "bSearchable": false,
					        	  "bSortable"  : false,
					        	  "sClass": 'col-md-2',
					        	  "mData": function (data){
					        		  var duzenle = '<button class="btn yellow load-modal" data-target="#generalModal" data-href="'+app.getBase()+'admin/kategori/duzenle/id:'+data.DT_RowId+'" data-form="true">Düzenle</button>';
					        		  var sil = '<button class="btn red load-modal" data-target="#generalModal" data-href="'+app.getBase()+'admin/kategori/sil/id:'+data.DT_RowId+'" data-form="true">Sil</button>';
					        		  return duzenle + sil;
					        	  }
					          }
		        ]
		    } );
		},
		markalar : function (){
		    jQuery('#markalarTable').dataTable( {
		        "ajax": app.getBase() + "admin/marka/dataTableListele",
	            "language": {
	                "url":"//cdn.datatables.net/plug-ins/1.10.6/i18n/Turkish.json"
	            },
		        "deferRender": true,
		        "aaSorting": [],
		        "aoColumns": [
		                      {
					               "sTitle" : "Marka Adı",
					               "mData": "ad" 
					               
					          },
		                      {
					               "sTitle" : "Sıralama",
					               "mData": "siralama" 
					               
					          },
					          {
					        	  "sTitle" : "Yönet",
					        	  "bSearchable": false,
					        	  "bSortable"  : false,
					        	  "sClass": 'col-md-2',
					        	  "mData": function (data){
					        		  var duzenle = '<button class="btn yellow load-modal" data-target="#generalModal" data-href="'+app.getBase()+'admin/marka/duzenle/id:'+data.DT_RowId+'" data-form="true">Düzenle</button>';
					        		  var sil = '<button class="btn red load-modal" data-target="#generalModal" data-href="'+app.getBase()+'admin/marka/sil/id:'+data.DT_RowId+'" data-form="true">Sil</button>';
					        		  return duzenle + sil;
					        	  }
					          }
		        ]
		    } );
		},
		seriler : function (){
		    jQuery('#serilerTable').dataTable( {
		        "ajax": app.getBase() + "admin/seri/dataTableListele",
	            "language": {
	                "url":"//cdn.datatables.net/plug-ins/1.10.6/i18n/Turkish.json"
	            },
		        "deferRender": true,
		        "aaSorting": [[1,'asc'],[0,'asc']],
		        "aoColumns": [
		                      {
					               "sTitle" : "Seri Adı",
					               "mData": "ad" 
					               
					          },
		                      {
					               "sTitle" : "Marka",
					               "mData": "marka_adi"
					               
					          },
					          {
					        	  "sTitle" : "Yönet",
					        	  "bSearchable": false,
					        	  "bSortable"  : false,
					        	  "sClass": 'col-md-2',
					        	  "mData": function (data){
					        		  var duzenle = '<button class="btn yellow load-modal" data-target="#generalModal" data-href="'+app.getBase()+'admin/seri/duzenle/id:'+data.DT_RowId+'" data-form="true">Düzenle</button>';
					        		  var sil = '<button class="btn red load-modal" data-target="#generalModal" data-href="'+app.getBase()+'admin/seri/sil/id:'+data.DT_RowId+'" data-form="true">Sil</button>';
					        		  return duzenle + sil;
					        	  }
					          }
		        ]
		    } );
		},
		modeller : function (){
		    jQuery('#modellerTable').dataTable( {
		        "ajax": app.getBase() + "admin/model/dataTableListele",
	            "language": {
	                "url":"//cdn.datatables.net/plug-ins/1.10.6/i18n/Turkish.json"
	            },
		        "deferRender": true,
		        "aaSorting": [[1,'asc'], [2,'asc']],
		        "aoColumns": [
		                      {
					               "sTitle" : "Model Adı",
					               "mData": "ad" 
					               
					          },
		                      {
					               "sTitle" : "Seri",
					               "mData": "seri_adi" 
					               
					          },
					          {
					        	  "sTitle" : "Marka",
					        	   "mData" : "marka_adi"	  
					          },
					          {
					        	  "sTitle" : "Yönet",
					        	  "bSearchable": false,
					        	  "bSortable"  : false,
					        	  "sClass": 'col-md-2',
					        	  "mData": function (data){
					        		  var duzenle = '<button class="btn yellow load-modal" data-target="#generalModal" data-href="'+app.getBase()+'admin/model/duzenle/id:'+data.DT_RowId+'" data-form="true">Düzenle</button>';
					        		  var sil = '<button class="btn red load-modal" data-target="#generalModal" data-href="'+app.getBase()+'admin/model/sil/id:'+data.DT_RowId+'" data-form="true">Sil</button>';
					        		  return duzenle + sil;
					        	  }
					          }
		        ]
		    } );
		},
		sliderlar : function (){
		    jQuery('#sliderlarTable').dataTable( {
		        "ajax": app.getBase() + "admin/slider/dataTableListele",
	            "language": {
	                "url":"//cdn.datatables.net/plug-ins/1.10.6/i18n/Turkish.json"
	            },
		        "deferRender": true,
		        "aaSorting": [[2,'asc'], [1,'asc']],
		        "aoColumns": [
		                      {
					               "sTitle" : "Açıklama",
					               "mData": "aciklama" 
					               
					          },
		                      {
					               "sTitle" : "Sıralama",
					               "mData": "siralama" 
					               
					          },
					          {
					        	  "sTitle" : "Aktif",
					        	   "mData" : "aktif",
					        	   "mRender": function(data){
					        		   if(data==1){
					        			   return "Aktif";
					        		   }else{
					        			   return "Pasif";
					        		   }
					        	   }
					          },
					          {
					        	  "sTitle" : "Yönet",
					        	  "bSearchable": false,
					        	  "bSortable"  : false,
					        	  "sClass": 'col-md-2',
					        	  "mData": function (data){
					        		  var duzenle = '<button class="btn yellow load-modal" data-target="#generalModal" data-href="'+app.getBase()+'admin/slider/duzenle/id:'+data.DT_RowId+'" data-form="true">Düzenle</button>';
					        		  var sil = '<button class="btn red load-modal" data-target="#generalModal" data-href="'+app.getBase()+'admin/slider/sil/id:'+data.DT_RowId+'" data-form="true">Sil</button>';
					        		  return duzenle + sil;
					        	  }
					          }
		        ]
		    } );
		},
		musteriler : function (){
		    jQuery('#musterilerTable').dataTable( {
		        "ajax": app.getBase() + "admin/musteri/dataTableListele",
	            "language": {
	                "url":"//cdn.datatables.net/plug-ins/1.10.6/i18n/Turkish.json"
	            },
		        "deferRender": true,
		        "aaSorting": [[0,'asc']],
		        "aoColumns": [
		                      {
					               "sTitle" : "Müşteri Adı",
					               "mData": "ad" 
					               
					          },
		                      {
					               "sTitle" : "Cep Telefonu",
					               "mData": "cep_telefon" 
					               
					          },
		                      {
					               "sTitle" : "Email",
					               "mData": "email" 
					               
					          },
					          {
					        	  "sTitle" : "Detay",
					        	  "bSearchable": false,
					        	  "bSortable"  : false,
					        	  "sClass": 'col-md-3 text-center',
					        	  "mData": function (data){
					        		  var detay = '<a class="btn green" href="'+app.getBase()+'admin/musteri/goruntule/id:'+data.DT_RowId+'">Görüntüle</a>';
					        		  var sil = '<button class="btn red load-modal" data-target="#generalModal" data-href="'+app.getBase()+'admin/musteri/sil/id:'+data.DT_RowId+'" data-form="true">Sil</button>';
					        		  return detay + sil;
					        	  }
					          }
		        ]
		    });
		},
		musteriNotlari : function (id){
		    jQuery('#musteriNotlariTable').dataTable( {
		        "ajax": app.getBase() + "admin/musteri/musteriNotDataTable/id:"+id,
	            "language": {
	                "url":"//cdn.datatables.net/plug-ins/1.10.6/i18n/Turkish.json"
	            },
		        "deferRender": true,
		        "aaSorting": [],
		        "aoColumns": [
		                      {
					               "sTitle" : "Not",
					               "mData": "aciklama" 
					               
					          },
					          {
					        	  "sTitle" : "Detay",
					        	  "bSearchable": false,
					        	  "bSortable"  : false,
					        	  "sClass": 'col-md-2',
					        	  "mData": function (data){
					        		  var duzenle = '<button class="btn yellow load-modal" data-target="#generalModal" data-href="'+app.getBase()+'admin/musteri/duzenleNot/id:'+data.DT_RowId+'" data-form="true">Düzenle</button>';
					        		  var sil = '<button class="btn red load-modal" data-target="#generalModal" data-href="'+app.getBase()+'admin/musteri/silNot/id:'+data.DT_RowId+'" data-form="true">Sil</button>';
					        		  return duzenle + sil;
					        	  }
					          }
		        ]
		    });
		},
		ilanlar : function (id){
		    jQuery('#ilanlarTable').dataTable( {
		        "ajax": app.getBase() + "admin/ilan/dataTableListele",
	            "language": {
	                "url":"//cdn.datatables.net/plug-ins/1.10.6/i18n/Turkish.json"
	            },
		        "deferRender": true,
		        "aaSorting": [],
		        "aoColumns": [
		                      {
					               "sTitle" : "İlan No",
					               "mData": "id" 
					               
					          },
		                      {
					               "sTitle" : "Başlık",
					               "mData": "baslik" 
					               
					          },
		                      {
					               "sTitle" : "Kategori",
					               "mData": "kategori_adi" 
					               
					          },
		                      {
					               "sTitle" : "Marka",
					               "mData": "marka_adi" 
					               
					          },
		                      {
					               "sTitle" : "Model",
					               "mData": "model_adi" 
					               
					          },
		                      {
					               "sTitle" : "Aktif",
					               "mData": "aktif",
					               "mRender" : function(data){
					            	   if(data == 1){
					            		   return "Aktif";
					            	   }else{
					            		   return "Pasif";
					            	   }
					               }
					               
					          },
					          {
					        	  "sTitle" : "Yönet",
					        	  "bSearchable": false,
					        	  "bSortable"  : false,
					        	  "sClass": 'col-md-2',
					        	  "mData": function (data){
					        		  var duzenle = '<button class="btn yellow load-modal" data-target="#generalModal" data-href="'+app.getBase()+'admin/ilan/duzenle/id:'+data.DT_RowId+'" data-form="true">Düzenle</button>';
					        		  var sil = '<button class="btn red load-modal" data-target="#generalModal" data-href="'+app.getBase()+'admin/ilan/sil/id:'+data.DT_RowId+'" data-form="true">Sil</button>';
					        		  return duzenle + sil;
					        	  }
					          }
		        ]
		    });
		}
	}
}();