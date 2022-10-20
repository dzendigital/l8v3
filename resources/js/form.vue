<template> 
    <form>
        <fieldset class="uk-fieldset">
            <legend class="uk-legend">Legend</legend>
            <div class="uk-margin">
                <input class="uk-input" type="text" v-model="form.name" placeholder="имя" required>
            </div>
            <div class="uk-margin">
                <input class="uk-input" type="text" v-model="form.sname" placeholder="фамилия" required>
            </div>
            <div class="uk-margin">
                <input class="uk-input" type="text" v-model="form.email" placeholder="почта" required>
            </div>
            <div class="uk-margin">
                <label>выбрать дату</label>
                <input v-model="form.date_at" style="width: 100%; box-sizing: border-box; padding: 10px;" type="date" required>
            </div>
            <div class="uk-margin">
                <select class="uk-select" v-model="form.select" value="доверенность">
                    <option>доверенность</option>
                    <option>наследство</option>
                    <option>справка</option>
                </select>
            </div>
            <div class="uk-margin">
                <a class="uk-button uk-button-default" @click="submit">Сохранить</a>
            </div>
        </fieldset>
    </form>
    <ul class="uk-list uk-list-striped" v-if="userdata.length != 0">
        <li>
            Добавленные записи:
        </li>
        <li v-for="ud in userdata">
            {{ ud.name }},
            {{ ud.sname }},
            {{ ud.email }},
            {{ ud.date_at }},
            {{ ud.select }},            
        </li>
    </ul>
</template>
<script>
  export default {
    data() {
      return {
        form: {
          name: "dima",
          sname: "basharkin",
          email: "dima@mail.ru",
          date_at: "2022-10-20",
          select: "доверенность",
        },
        userdata: [],
      }
    },
    methods: {
      submit() 
      {
        var vm = this;
        let request_data = vm.form;

        let formData = new FormData();
        for ( let key in request_data ) {
            formData.append(key, request_data[key]);
        }
        fetch(`/api/form`, {
            headers: {
                "X-CSRF-TOKEN": document.querySelector(`meta[name='csrf-token']`).getAttribute('content')
            },
            method: 'POST',
            body: formData
        })
        .then(function(response){
            return response.json();
        })
        .then(function (result) {
            vm.response(result['message']);
            if ( result['is_store'] != null ) { 
              vm.reset();
              vm.updateUserdata();
            }
        });
        console.log("form reset complete.")
      },
      reset()
      {
        for( let f in this.form ){
          this.form[f] = "";
        }
        return;
      },
      response(message = "Форма отправлена")
      {
        document.querySelector(`#modal-center p`).innerText = message;
        UIkit.modal(`#modal-center`).show();
        return;
      },
      updateUserdata()
      {
        var vm = this;
        fetch(`/api/form`, {
            headers: {
                "X-CSRF-TOKEN": document.querySelector(`meta[name='csrf-token']`).getAttribute('content')
            },
            method: 'GET',
        })
        .then(function(response){
            return response.json();
        })
        .then(function (result) {
            console.log(result);
            console.log(result["userdata"]);
            vm.userdata = result['userdata'];
        });
      }
    },
    updated() {
      console.log("updated")
    },
    created() {
      console.log("created")
        this.updateUserdata();
    }
  }
</script>