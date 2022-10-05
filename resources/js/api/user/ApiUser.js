import Request from '../request.js'

export default {

    loadUserFromApi(url) {
        return Request.getCall(url)
    }

}
