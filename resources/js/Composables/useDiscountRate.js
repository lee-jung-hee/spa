import { computed, isRef } from 'vue'

export const useDiscountRate = (originPrice, term, deposit) => {
    const discountRate = computed(() => {
        let discountAmount = 0;
        const originMonthly = isRef(originPrice) ? originPrice.value : originPrice;
        const depositValue = isRef(deposit) ? deposit.value : deposit;
        const termValue = isRef(term) ? term.value : term;

        // 보증금 할인 적용
        if (depositValue >= 200) {
            discountAmount += Math.floor((depositValue - 100) / 100) * 2000; // 200부터 100당 2000원 할인
        }
    
        let discountedPrice = originMonthly - discountAmount;
    
        // 계약 기간 할인 적용
        if (termValue > 2) {
            discountedPrice -= (discountedPrice * (termValue - 2) / 100); // 4부터 1%씩 할인
        }
        return discountedPrice;
    })

    const totalDiscountRate = computed(() => {
        const originMonthly = isRef(originPrice) ? originPrice.value : originPrice;
        const discountedPrice = discountRate.value;

        // 원래 가격이 0이 아니어야 퍼센트 계산 가능
        if (originMonthly !== 0) {
            const discountPercentage = ((originMonthly - discountedPrice) / originMonthly) * 100;
            return discountPercentage.toFixed(2); // 소수점 두 자리까지 표시
        }
        return 0;
    })

    return { discountRate, totalDiscountRate }
}
