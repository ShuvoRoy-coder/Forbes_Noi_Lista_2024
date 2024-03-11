export function useHelpers() {

    function url(string) {

        const prefix = window.mainUrl;

        if(string.startsWith('/')) {
            string = string.slice(1)
        }

        return prefix + string;
    }

    return { url };
}