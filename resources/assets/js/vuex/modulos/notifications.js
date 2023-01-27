export default {
    state: {
        itens: []
    },

    
    mutations: {
        LOAD_NOTIFICATIONS (state, notifications) {
            state.itens = notifications
        },

        MARK_AS_READ (state, id){
            let index = state.itens.filter(notification => notification.id == id)
            state.itens.splice(index, 1)
        },

        MARK_ALL_AS_READ (state){
            state.itens = []
        }
    },

    actions: {
        loadNotifications (context) {
            axios.get(flagsUrl + '/notifications').then(response => { 
                context.commit('LOAD_NOTIFICATIONS', response.data.notifications );
            })
        },

        markAsRead (context,params) {
            axios.put(flagsUrl + '/notification-read', params ).then(() => context.commit('MARK_AS_READ', params.id))
        },

        markAllasRead (context) {
            axios.put(flagsUrl + '/notification-all-read')
                        .then(() => context.commit('MARK_ALL_AS_READ'))
        }
    }
}
