import React, { Component } from "react";
import axios from "axios";
// import axios from 'axios'

class Login extends Component {
    constructor() {
        super();
        this.state = {
            response: [],
            user: {
                email: "",
                password: ""
            }
        };
        this.handleSubmit = this.handleSubmit.bind(this);
        this.handleEmail = this.handleEmail.bind(this);
        this.handlePassword = this.handlePassword.bind(this);
    }

    handleSubmit(event){
        event.preventDefault();
        console.log(this.state.user)
        axios.post('/api/login',this.state.user).then( response =>{
            // console.log(response.data);
            let appState = {
                isAuthenticated: true,
                token: response.data.access_token
            }
            localStorage["authorization"] = JSON.stringify(appState);
            console.log("login success")
        }).catch( error =>{
            console.log(error)
        });
    }
    handleEmail(e){
        e.preventDefault();
        let value = e.target.value;
       this.setState(prevState => ({
           user: {
               ...prevState.user,
               email: value
           }
       }));
        console.log(this.state.user.email)
    }
    handlePassword(e){
        e.preventDefault();
        let value = e.target.value
        this.setState(prevState => ({
            user: {
                ...prevState.user, password: value
            }
        }));
        console.log(this.state.user.password)
    }

    render() {
        return (
            <div className="container">
                <form>
                    <div className="form-group">
                        <label htmlFor="exampleInputEmail1">
                            Email address
                        </label>
                        <input
                            type="email"
                            className="form-control"
                            id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                            placeholder="Enter email"
                            onChange={this.handleEmail}
                        />
                        <small id="emailHelp" className="form-text text-muted">
                            We'll never share your email with anyone else.
                        </small>
                    </div>
                    <div className="form-group">
                        <label htmlFor="exampleInputPassword1">Password</label>
                        <input
                            type="password"
                            className="form-control"
                            id="exampleInputPassword1"
                            placeholder="Password"
                            onChange={this.handlePassword}
                        />
                    </div>
                    <div className="form-check">
                        <input
                            type="checkbox"
                            className="form-check-input"
                            id="exampleCheck1"
                        />
                        <label
                            className="form-check-label"
                            htmlFor="exampleCheck1"
                        >
                            Check me out
                        </label>
                    </div>
                    <button
                        onClick={this.handleSubmit}
                        className="btn btn-primary"
                    >
                        Submit
                    </button>
                </form>
            </div>
        );
    }
}

export default Login;
