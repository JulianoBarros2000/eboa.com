
/* ======Configuração do primeiro Gráfico no Dashboard view===== */
 const ctx1 = document.getElementById('balanco1');

 new Chart(ctx1, { 
   type: 'bar',
   data: {
     labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago','Set','Out','Nov','Dez'],
     datasets: [{
       label: ' (% - Percentagem) - produtos vendidos ',
       data: [70, 18, 34, 60, 10, 3, 20, 90, 16, 5, 100, 76],
       borderWidth: 1,
       backgroundColor:['#9bf5a2','#7be8fc','#ee9f91','#fce97b','#0984f7','#f11a30','#fa7a11','#fa3130','#dede11','#cc7a30','#fa7a30','#0984f7']
       
     }]
   },
   options: {
     responsive:true,
     animation:{
      duration: 10000,
      easing:'easeOutExpo'
     }

   }
 });

 /* ====== Configuração do segundo Gráfico no Dashboard view ===== */
 const ctx2 = document.getElementById('balanco2');
 new Chart(ctx2, { 
   type: 'doughnut',
   data: {
     labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago','Set','Nov','Dez'],
     datasets: [{
       label: 'Produtos',
       data: [12, 10, 3, 40, 2, 3, 20, 10, 16, 9, 0, 8],
       borderWidth: 0,
       backgroundColor:['#9bf5a2','#7be8fc','#ee9f91','#fce97b','#0984f7','#f11a30','#fa7a11','#fa3130','#dede11','#cc7a30','#fa7a30','#fa7a30']
       ,borderColor:'red'
      
     }]
   },
   options: {
     responsive:true,
     animation:{
      duration: 10000,
      easing:'easeOutExpo'
     }
    
   }
 });
/* FIM============================================ */