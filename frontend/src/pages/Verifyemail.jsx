import React, { useEffect, useState } from 'react';
import { useParams, useHistory } from 'react-router-dom';
import axiosClient from '../Axios/Axios-client';

const VerifyEmail = () => {
    const { id, hash } = useParams();
    const [message, setMessage] = useState('');
    const history = useHistory();

    useEffect(() => {
        const verifyEmail = async () => {
            try {
                const response = await axiosClient.post(`/api/verify-email`, { id, hash });
                setMessage('Email successfully verified! You can now log in.');
                setTimeout(() => history.push('/login'), 3000);
            } catch (error) {
                setMessage('Email verification failed.');
            }
        };
        verifyEmail();
    }, [id, hash]);

    return <div>{message}</div>;
};

export default VerifyEmail;
