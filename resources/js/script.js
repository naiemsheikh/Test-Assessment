new Vue({
    data(){
      return{
        tableData:[],
        tableRow: []
      }
    },
    mounted(){
      window.addEventListener('load',  this.onLoad())
    },
    methods:{
      handleDrop(f){
        var reader = new FileReader(),
            name = f.name, vm = this;
        reader.onload =  (e) =>{
          var data = e.target.result,
              workbook = XLSX.read(data, { type: 'binary' }),
              sheetName = workbook.SheetNames[0],
              sheet = workbook.Sheets[sheetName];
          var temp = []
          for (var row = 1; ; row++) {
            if (sheet['A' + row] == null) {
              break;
            }
            
            for (var col = 65; col <= 90; col++) {
              var c = String.fromCharCode(col);// get 'A', 'B', 'C' ...
              var key = '' + c + row;
              if (sheet[key] == null) {
                break;
              }
              
              vm.tableRow.push(sheet[key]['w']);
            }
            vm.tableData.push(vm.tableRow);
            vm.tableRow = []
          }
        };
        reader.readAsBinaryString(f);
      },
      onLoad(){
        var target = this.$refs.target;
        target.addEventListener('dragenter', function () {
          this.classList.remove('hover');
        });
        target.addEventListener('dragleave', function () {
          this.classList.add('hover');
        });
        target.addEventListener('dragover', function (e) {
          this.classList.remove('hover');
          e.preventDefault();
        });
        
        target.addEventListener('drop',  (e) => {
          e.preventDefault();
          this.handleDrop(e.dataTransfer.files[0]);
        });
      }
    }
  }).$mount("#app")