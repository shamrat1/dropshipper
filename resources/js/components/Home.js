import React, {Component} from 'react'
import axios from 'axios';

class Home extends Component {
    constructor() {
        super();

        this.state = {
            isAuthenticated: false,
            token: "",
            user: {}
        };
    }
    UNSAFE_componentWillMount() {
        let appState = localStorage["authorization"];
        // console.log(appState);
        if (!appState) {
            let appState = {
                isAuthenticated: false,
                token: ""
            };
            localStorage["authorization"] = appState;
        } else {
            // console.log(true)
            let state = JSON.parse(appState);
            this.setState({
                isAuthenticated: state.isAuthenticated,
                token: state.token
            });
        }
    }
    componentDidMount() {
        if (this.state.isAuthenticated) {
            axios
                .get("/api/user", {
                    headers: {
                        'Authorization': `Bearer ${this.state.token}`
                    }
                })
                .then(response => {
                    // console.log(response);
                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
    render() {
        return (
            <div>
                <h1>Home token: {this.state.token}</h1>
            </div>
        );
    }
}


export default Home