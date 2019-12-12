class Category {
    static delete(id) {
        return axios.delete('/categories/' + id);
    }

    static all(then) {
        return axios.get('/categories')
            .then(({data}) => then(data));
    }
}

export default Category;
