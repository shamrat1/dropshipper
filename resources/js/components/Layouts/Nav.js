import React, {Component} from 'react'
import { Link, Redirect } from 'react-router-dom'
import axios from 'axios';

class Nav extends Component {
    constructor(){
        super();
        this.state = {
            isAuthenticated : false,
            token : ''
        }
        this.logout = this.logout.bind(this)
    }
    componentDidMount(){
        let appState = localStorage['authorization']
        // console.log(appState)
        if(appState){
            let state = JSON.parse(appState)
            this.setState({
                isAuthenticated: state.isAuthenticated,
                token: state.token
            })
        }
    }

    logout(){
        console.log(this.state)
        axios.get('/api/logout',{
            headers:{
                'Authorization': `Bearer ${this.state.token}`
            }
        }).then( response => {
            console.log(response);
            if(response.status == 200){
                this.setState({
                    isAuthenticated : false,
                    token : ''
                })
                localStorage['authorization'] = JSON.stringify(this.state)
                console.log(this.state);
                <Redirect to='/login' />
            }
        }).catch( error => {
            console.log(error)
        })
    }

    render(){
        
        let logoutButton = '';
        if(this.state.isAuthenticated){
            logoutButton = <button onClick={this.logout} className="btn btn-danger">Logout</button>
        }else{
            logoutButton = (
                <button className="btn btn-danger">
                    Logout
                </button>
            );
        }

        return (
            <nav className="navbar navbar-expand-lg navbar-light bg-light">
                <a className="navbar-brand" href="#">
                    Pickbazar
                </a>
                <button
                    className="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span className="navbar-toggler-icon"></span>
                </button>

                <div
                    className="collapse navbar-collapse"
                    id="navbarSupportedContent"
                >
                    <ul className="navbar-nav mr-auto">
                        <li className="nav-item active">
                            <Link to="/" className="nav-link">
                                Home
                            </Link>
                        </li>
                        <li className="nav-item">
                            {/* <a className="nav-link" href="/login">Login</a> */}
                            <Link className="nav-link" to="/login">
                                Login
                            </Link>
                        </li>
                        <li className="nav-item dropdown">
                            <a
                                className="nav-link dropdown-toggle"
                                href="#"
                                id="navbarDropdown"
                                role="button"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >
                                Dropdown
                            </a>
                            <div
                                className="dropdown-menu"
                                aria-labelledby="navbarDropdown"
                            >
                                <a className="dropdown-item" href="#">
                                    Action
                                </a>
                                <a className="dropdown-item" href="#">
                                    Another action
                                </a>

                                <div className="dropdown-divider"></div>
                                {logoutButton}
                            </div>
                        </li>
                        <li className="nav-item">
                            <a className="nav-link disabled" href="#">
                                Disabled
                            </a>
                        </li>
                    </ul>
                    <form className="form-inline my-2 my-lg-0">
                        <input
                            className="form-control mr-sm-2"
                            type="search"
                            placeholder="Search"
                            aria-label="Search"
                        />
                        <button
                            className="btn btn-outline-success my-2 my-sm-0"
                            type="submit"
                        >
                            Search
                        </button>
                    </form>
                </div>
            </nav>
        );
    }
}

export default Nav